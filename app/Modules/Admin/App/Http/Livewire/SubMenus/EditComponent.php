<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\Admin\App\Http\Livewire\SubMenus;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use SIGA\Form\Fields\Select;
use SIGA\Form\Fields\Text;
use SIGA\Form\FormComponent;
use SIGA\Models\LandlordMenu;
use SIGA\Models\LandlordSubMenu;
use Symfony\Component\Finder\SplFileInfo;

class EditComponent extends FormComponent
{

    protected $route = "sub-menus";

    public function mount(LandlordSubMenu $submenu)
    {

        $this->setFormProperties($submenu);
    }

    /**
     * @return array
     */
    public function fields()
    {
        $submenu = LandlordSubMenu::query();
        $menu = LandlordMenu::query();
        return [
            Text::make('Name'),
            Text::make('Slug'),
            Select::make('Menu', 'menu_id')->target($menu, $this->isSingleSelectSearch('menu_id')),
            Select::make('Sub Menus', 'sub_menu_id')->target($submenu, $this->isSingleSelectSearch('sub_menu_id')),
            Text::make('Link'),
            Select::make('Icon')->options($this->icons()),
        ];
    }

    protected function icons()
    {
        $data = [];
        $fileSystem = new Filesystem();
        $path = resource_path('assets/icons');
        $files = collect($fileSystem->allFiles($path));
        $list = $files->map(function (SplFileInfo $file) {
            if (!$file->getRelativePath()) {
                $text = sprintf("cil-%s", Str::beforeLast($file->getBasename(), '.'));
            } else {
                $text = null;
            }
            if ($value = $this->isMultSelectSearch( 'icon')) {
                return Str::contains($text, $value) ? $text : null;
            }
            return $text;
        })->whereNotNull()->slice(0, 12);

        foreach ($list as $value) {
            $data[$value] = $value;
        }
        return $data;
    }
}
