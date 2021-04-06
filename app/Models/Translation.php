<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Ramsey\Uuid\Uuid;
use SIGA\Models\AbstractModel;
use SIGA\Scopes\UuidGenerate;

class Translation extends AbstractModel
{
    use HasFactory, UuidGenerate;

    /** @var array */
    public $guarded = ['id'];



    public static function boot()
    {
        parent::boot();
        $flushGroupCache = function (self $languageLine) {
            $languageLine->flushGroupCache();
        };

        static::saved($flushGroupCache);
        static::deleted($flushGroupCache);
    }

    public static function getTranslationsForGroup(string $locale, string $group): array
    {
        return Cache::rememberForever(static::getCacheKey($group, $locale), function () use ($group, $locale) {
            return static::query()
                    ->where('group', $group)
                    ->get()
                    ->reduce(function ($lines, self $languageLine) use ($locale) {
                        $translation = $languageLine->description;
                        if ($translation !== null) {
                            Arr::set($lines, $languageLine->name, $translation);
                        }
                        return $lines;
                    }) ?? [];
        });
    }

    public static function getCacheKey(string $group, string $locale): string
    {
        return "spatie.translation-loader.{$group}.{$locale}";
    }

    /**
     *
     * @return string
     */
    public function getTranslation(): ?string
    {
       return $this->description;
    }


    public function flushGroupCache()
    {
        Cache::forget(static::getCacheKey($this->group, config('app.locale')));
    }

}
