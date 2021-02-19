<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Table;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\View\View;
use SIGA\Table\Traits\{Exports,
    HtmlComponents,
    Kill,
    Loading,
    Message,
    Options,
    Pagination,
    Search,
    Sorting,
    Table,
    Yajra};
use Livewire\Component;
use Livewire\WithPagination;

abstract class TableComponent extends Component
{
    use
        Exports,
        Loading,
        Options,
        Pagination,
        Search,
        Sorting,
        Table,
        WithPagination,
        HtmlComponents,
        Yajra,
        Kill,
        Message,
        HasUtils,
        AuthorizesRequests;

    public function route()
    {

        return null;

    }

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 12],
        'direction' => ['except' => 'asc'],
        'field' => ['except' => 'created_at'],
    ];
    /**
     * The default pagination theme.
     *
     * @var string
     */
    public $paginationTheme = 'tailwind';

    /**
     * Whether or not to refresh the table at a certain interval
     * false is off
     * If it's an integer it will be treated as milliseconds (2000 = refresh every 2 seconds)
     * If it's a string it will call that function every 5 seconds.
     *
     * @var bool|string
     */
    public $refresh = false;

    /**
     * Whether or not to display an offline message when there is no connection.
     *
     * @var bool
     */
    public $offlineIndicator = true;

    /**
     * TableComponent constructor.
     *
     * @param null $id
     */
    public function __construct($id = null)
    {

        if (in_array(config('laravel-livewire-tables.theme'),['bootstrap-4',"core-ui"])) {
            $this->paginationTheme = 'bootstrap';
        }

        $this->setOptions(array_merge($this->options, config('laravel-livewire-tables',[])));

        parent::__construct($id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    abstract public function query(): Builder;


    /**
     * @return array
     */
    abstract public function columns(): array;

    /**
     * @return array
     */
    abstract public function layout(): string;

    /**
     * @return string
     */
    public function view(): string
    {
        return 'laravel-livewire-tables::' . config('laravel-livewire-tables.theme') . '.table-component';
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function render(): View
    {
        $ThemeConfig = [];

        return view($this->view(), [
            'columns' => $this->columns(),
            'models' => $this->paginationEnabled ? $this->models()->paginate($this->perPage) : $this->models()->get(),
        ])->layout($this->layout(),$ThemeConfig);
    }

    /**
     * @return Builder
     */
    public function models(): Builder
    {
        $builder = $this->query();

        if ($this->searchEnabled && trim($this->search) !== '') {
            $builder->where(function (Builder $builder) {
                foreach ($this->columns() as $column) {
                    if ($column->isSearchable()) {
                        if (is_callable($column->getSearchCallback())) {
                            $builder = app()->call($column->getSearchCallback(), ['builder' => $builder, 'term' => trim($this->search)]);
                        } elseif (Str::contains($column->getAttribute(), '.')) {
                            $relationship = $this->relationship($column->getAttribute());

                            $builder->orWhereHas($relationship->name, function (Builder $builder) use ($relationship) {
                                $builder->where($relationship->attribute, 'like', '%' . trim($this->search) . '%');
                            });
                        } else {
                            $builder->orWhere($builder->getModel()->getTable() . '.' . $column->getAttribute(), 'like', '%' . trim($this->search) . '%');
                        }
                    }
                }
            });
        }

        if (($column = $this->getColumnByAttribute($this->field)) !== false && is_callable($column->getSortCallback())) {
            return app()->call($column->getSortCallback(), ['builder' => $builder, 'direction' => $this->direction]);
        }

        return $builder->orderBy($this->getSortField($builder), $this->direction);
    }
}
