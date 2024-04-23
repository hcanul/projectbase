<?php

namespace App\Http\Livewire\Town;

use App\Models\Journey;
use App\Models\Town;
use Livewire\Component;
use Livewire\WithPagination;

class TownController extends Component
{
    use WithPagination;

    public $search, $selected_id, $pageTitle, $componentName, $name, $journey_id, $section;

    public $pagination = 10;

    protected $queryString = ['search'];

    protected $rules = [
        'name' => 'required|min:4',
        'journey_id' => 'required',
        'section' => 'required',
    ];

    protected $messages = [
        'name.required' => 'El valor es requerido',
        'name.min' => 'Debe contener mas de 4 caracteres',
        'journey_id.required' => 'El valor es requerido',
        'section.required' => 'El Valor es requerido',
    ];

    protected $listeners = [
        'deleteRow' => 'Destroy',
    ];

    public function mount()
    {
        $this->name = '';
        $this->journey_id = '';
        $this->search = '';
        $this->selected_id = 0;
        $this->section = '';
        $this->pageTitle = 'Listado';
        $this->componentName = 'SECCIÓN DE COMUNIDADES Y COLONIAS';
    }

    public function render()
    {
        if ($this->search){
            $data = Town::where('name', 'like', '%' . $this->search . '%')->paginate($this->pagination);
        }else {
            $data = Town::orderBy('id', 'asc')->paginate($this->pagination);
        }
        return view('livewire.town.component', ['data' => $data])
                ->extends('layouts.themes.app')
                ->section('content');
    }

    public function resetUI()
    {
        $this->name = '';
        $this->journey_id = '';
        $this->search = '';
        $this->selected_id = 0;
        $this->section = '';
        $this->pageTitle = 'Listado';
        $this->componentName = 'SECCIÓN DE RUTAS';
        $this->resetValidation();
        $this->resetPage();
    }

    public function Store()
    {
        $this->validate($this->rules, $this->messages);

        Town::create(['name' => $this->name, 'journey_id' => $this->journey_id, 'section' => $this->section]);

        $this->resetUI();

        session()->flash('message', 'Comunidad o Colonia Anexada con exito!');
        $this->emit('item-added', 'Comunidad o Colonia registrada Con Éxito!');
    }

    public function Editar($id)
    {
        $town = Town::find($id);

        $this->name = $town->name;

        $this->journey_id = $town->journey_id;

        $this->section = $town->section;

        $this->selected_id = $id;
    }

    public function Update()
    {
        $this->validate($this->rules, $this->messages);

        $town = Town::find($this->selected_id);

        $town->update(['name' => $this->name, 'journey_id' => $this->journey_id, 'section' =>  $this->section]);

        $this->resetUI();
        session()->flash('message', 'Comunidad o Colonia Actualizada con exito!');
        $this->emit('item-updated', 'Comunidad o Colonia Actualizada');
    }

    public function Destroy(Town $town)
    {
        $town->delete();
        session()->flash('delete', 'Comunidad o Colonia Eliminada con exito!');
        $this->emit('item-deleted', 'Comunidad o Colonia Eliminada con exito');
        $this->resetUI();
    }
}
