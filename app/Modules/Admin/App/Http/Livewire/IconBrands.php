<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Admin\App\Http\Livewire;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Livewire\Commands\ComponentParser;
use Livewire\Component;
use Symfony\Component\Finder\SplFileInfo;

class IconBrands extends Component
{
    protected $files;
    public $search;

    public function render()
    {
        $fileSystem = new Filesystem();
        $path = resource_path('assets/icons/brands');
        $this->files = collect($fileSystem->allFiles($path));
        return view('admin::livewire.icon-brands')->layout($this->layout());
    }

    public function getDatalistProperty()
    {
        return $this->files->map(function (SplFileInfo $file) {

            $text = sprintf("cib-%s", Str::beforeLast($file->getBasename(), '.'));

            return $text;
        })->whereNotNull();
    }

    public function getIconsProperty()
    {
        $result = $this->files->map(function (SplFileInfo $file) {

            $text = sprintf("cib-%s", Str::beforeLast($file->getBasename(), '.'));


            if ($this->search)
                return Str::contains($text, $this->search) ? $text : null;
            return $text;
        })->whereNotNull();

        return $result;
    }

    public function layout(): string
    {
        return 'admin::layouts.landlord';
    }
}
