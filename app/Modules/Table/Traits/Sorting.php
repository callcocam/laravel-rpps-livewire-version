<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Table\Traits;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
/**
 * Trait Sorting.
 */
trait Sorting
{
    /**
     * Sorting.
     */

    /**
     * The initial field to be sorting by.
     *
     * @var string
     */
    public $field = 'created_at';

    /**
     * The initial direction to sort.
     *
     * @var bool
     */
    public $direction = 'asc';

    /**
     * The default sort icon.
     *
     * @var string
     */
    public $sortDefaultIcon = '<i class="text-muted fas fa-sort"></i>';

    /**
     * The sort icon when currently sorting ascending.
     *
     * @var string
     */
    public $ascSortIcon = '<i class="fas fa-sort-up"></i>';

    /**
     * The sort icon when currently sorting descending.
     *
     * @var string
     */
    public $descSortIcon = '<i class="fas fa-sort-down"></i>';

    /**
     * @param $attribute
     */
    public function sort($attribute): void
    {
        if ($this->field !== $attribute) {
            $this->direction = 'asc';
        } else {
            $this->direction = $this->direction === 'asc' ? 'desc' : 'asc';
        }

        $this->field = $attribute;
    }

    /**
     * @param  Builder  $builder
     *
     * @return string
     */
    protected function getSortField(Builder $builder): string
    {
        if (Str::contains($this->field, '.')) {
            $relationship = $this->relationship($this->field);

            return $this->attribute($builder, $relationship->name, $relationship->attribute);
        }

        return $this->field;
    }
}
