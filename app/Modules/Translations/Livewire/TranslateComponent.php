<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Translations\Livewire;


use App\Models\Translation;
use Livewire\Component;

class TranslateComponent extends Component
{
    protected $group;
    public $name, $description;
    public $form_data = [];

    /**
     * @param string $group
     */
    public function mount(string $group = 'strings')
    {
        $this->setFormProperties($group);
    }

    public function setFormProperties($group)
    {
        $translations = Translation::query()->where('group', $group)->get();
        if ($translations) {
            foreach ($translations as $translation) {
                $this->form_data[$translation->id] = $translation->toArray();
            }
        }
    }

    public function render()
    {

        return view('trans::livewire.translate-component')->with('group', $this->group);
    }

    public function delete($id, $group)
    {
        Translation::find($id)->detete();

        $this->setFormProperties($group);
    }

    public function update($id, $group)
    {

        Translation::query()->update($this->form_data[$id]);
        $this->setFormProperties($group);
    }

    public function create($group)
    {

        $this->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        Translation::query()->create([
            'group' => $group,
            'name' => $this->name,
            'description' => $this->description,
        ]);
        $this->reset(['name', 'description']);
        $this->setFormProperties($group);
    }
}
