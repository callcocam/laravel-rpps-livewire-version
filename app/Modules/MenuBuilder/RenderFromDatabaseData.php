<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Modules\MenuBuilder;


class RenderFromDatabaseData
{
    private $mb; // MenuBuilder
    private $data;

    public function __construct()
    {
        $this->mb = new MenuBuilder();
    }

    private function addTitle($data)
    {
        $this->mb->addTitle($data->id, $data->name, false, 'coreui', $data->ordering);
    }

    private function addLink($data)
    {
        if ($data->parent === NULL) {
            $this->mb->addLink($data->id, $data->name, $data->slug, $data->icon, 'coreui', $data->ordering);
        }
    }

    private function dropdownLoop($id,$sub_menus)
    {

        foreach ($sub_menus as $sub_menu) {
            if ($sub_menu->parent == $id) {
                if ($sub_menu->assets === 'dropdown') {
                    $this->addDropdown($sub_menu);
                } elseif ($sub_menu->assets === 'link') {
                    $this->mb->addLink($sub_menu->id, $sub_menu->name, $sub_menu->slug, $sub_menu->icon, 'coreui', $sub_menu->ordering);
                } else {
                    $this->addTitle($sub_menu);
                }
            }
        }
    }

    private function addDropdown($data)
    {
        $this->mb->beginDropdown($data->id, $data->name, $data->icon, 'coreui', $data->ordering);

        if($data->submenus){

            $this->dropdownLoop($data->id,$data->submenus);
        }
        $this->mb->endDropdown();
    }

    private function mainLoop()
    {

        foreach ($this->data as $menu) {

            switch ($menu->assets) {
                case 'title':
                    $this->addTitle($menu);
                    break;
                case 'link':
                    $this->addLink($menu);
                    break;
                case 'dropdown':
                    if ($menu->parent == null) {
                        $this->addDropdown($menu);
                    }
                    break;
            }
        }
    }

    /***
     * $data - array
     * return - array
     */
    public function render($data)
    {
        if ($data) {
            $this->data = $data->submenus;
            $this->mainLoop();
        }
        return $this->mb->getResult();
    }
}
