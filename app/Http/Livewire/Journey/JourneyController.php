<?php

namespace App\Http\Livewire\Journey;

use App\Models\Journey;
use Livewire\Component;
use Livewire\WithPagination;

class JourneyController extends Component
{
    use WithPagination;

    public $search, $selected_id, $pageTitle, $componentName, $name, $type;

    public $pagination = 10;

    protected $queryString = ['search'];

    protected $rules = [
        'name' => 'required',
        'type' => 'required'
    ];

    protected $messages = [
        'name.required' => 'El valor es requerido',
        'type.required' => 'El valor es requerido',
    ];

    protected $listeners = [
        'deleteRow' => 'Destroy',
    ];

    public function mount()
    {
        $this->name = '';
        $this->type = '';
        $this->search = '';
        $this->selected_id = 0;
        $this->pageTitle = 'Listado';
        $this->componentName = 'SECCIÓN DE RUTAS';
    }

    public function render()
    {
        if ($this->search){
            $data = Journey::where('type', 'like', '%' . $this->search . '%')->paginate($this->pagination);
        }else{
            $data = Journey::orderby('id', 'asc')->paginate($this->pagination);
        }
        return view('livewire.journey.component', ['data'=>$data])
        ->extends('layouts.themes.app')
        ->section('content');
    }

    public function resetUI()
    {
        $this->name = '';
        $this->type = '';
        $this->search = '';
        $this->selected_id = 0;
        $this->pageTitle = 'Listado';
        $this->componentName = 'SECCIÓN DE RUTAS';
        $this->resetValidation();
        $this->resetPage();
    }

    public function Store()
    {
        $this->validate($this->rules, $this->messages);

        Journey::create(['name' => $this->name, 'type' => $this->type]);

        $this->resetUI();

        session()->flash('message', 'Ruta Anexada con exito!');
        $this->dispatch('item-added', 'Ruta registrada Con Éxito!');
    }

    public function Editar($id)
    {
        $journey = Journey::find($id);

        $this->name = $journey->name;

        $this->type = $journey->type;

        $this->selected_id = $id;
    }

    public function Update()
    {
        $this->validate($this->rules, $this->messages);

        $journey = Journey::find($this->selected_id);

        $journey->update(['name' => $this->name, 'type' => $this->type]);

        $this->resetUI();
        session()->flash('message', 'Ruta Editada con exito!');
        $this->dispatch('item-updated', 'Ruta Actualizada');
    }

    public function Destroy(Journey $journey)
    {
        $journey->delete();
        session()->flash('delete', 'Ruta Eliminada con exito!');
        $this->dispatch('item-deleted', 'Ruta Eliminada con exito');
        $this->resetUI();
    }
}
