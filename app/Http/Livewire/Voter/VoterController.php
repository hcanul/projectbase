<?php

namespace App\Http\Livewire\Voter;

use App\Models\Activist;
use App\Models\Agent;
use App\Models\Coordinator;
use App\Models\Town;
use App\Models\Voter;
use Livewire\Component;
use Livewire\WithPagination;

class VoterController extends Component
{
    use WithPagination;

    public $search, $selected_id, $pageTitle, $componentName, $loading;

    public $coordinator_id, $agent_id, $activist_id, $name, $lastname, $tel, $email, $facebook, $street, $town_id, $yearold, $section, $clave, $curp, $type, $ruta;

    public $pagination = 10;

    protected $queryString = ['search'];

    protected $rules = [
        'coordinator_id' => 'required',
        'agent_id' => 'required',
        'activist_id' => 'required',
        'name' => 'required',
        'lastname' => 'required',
        'tel' => 'required',
        'email' => 'required|email|unique:coordinators',
        'street' => 'required',
        'town_id' => 'required',
        'yearold' => 'required',
        'clave' => 'required',
        'curp' =>  'required|unique:coordinators',
        'type' => 'required',
        'ruta' => 'required'
    ];

    protected $messages = [
        'coordinator_id.required' => 'El campo debe ser rellenado',
        'agent_id.required' => 'El campo debe ser rellenado',
        'activist_id.required' => 'El campo debe ser rellenado',
        'name.required' => 'El nombre es requerido',
        'lastname.required' => 'Los apellidos son requeridos',
        'tel.required' => 'La telefono es requerida',
        'email.required' => 'El correo electronico es requerido',
        'email.email' => 'No tiene un formato de email valido',
        'email.unique' => 'Ya existe el usuario registrado con este correo',
        'street.required' => 'La dirección es requerida',
        'town_id.required' => 'Seleccione una colonia',
        'yearold.required' => 'Ingrese la edad',
        'clave.required' => 'La clave electoral ya existe en los registros',
        'curp.required' => 'El CURP es requerido',
        'curp.unique' => 'Ya se encuentra registrada esta clave en nuestros registros',
        'type.required' => 'Debe seleccionar un tipo de coordinador',
        'ruta.required' => 'Es necesario agregar la ruta'
    ];

    protected $rulesUpdate = [
        'coordinator_id' => 'required',
        'agent_id' => 'required',
        'activist_id' => 'required',
        'name' => 'required',
        'lastname' => 'required',
        'tel' => 'required',
        'email' => 'required|email|unique:coordinators',
        'street' => 'required',
        'town_id' => 'required',
        'yearold' => 'required',
        'clave' => 'required',
        'curp' =>  'required',
        'type' => 'required',
        'ruta' => 'required'
    ];

    protected $messagesUpdate = [
        'coordinator_id.required' => 'El campo debe ser rellenado',
        'agent_id.required' => 'El campo debe ser rellenado',
        'activist_id.required' => 'El campo debe ser rellenado',
        'name.required' => 'El nombre es requerido',
        'lastname.required' => 'Los apellidos son requeridos',
        'tel.required' => 'La telefono es requerida',
        'email.required' => 'El correo electronico es requerido',
        'email.email' => 'No tiene un formato de email valido',
        'email.unique' => 'Ya existe el usuario registrado con este correo',
        'street.required' => 'La dirección es requerida',
        'town_id.required' => 'Seleccione una colonia',
        'yearold.required' => 'Ingrese la edad',
        'clave.required' => 'La clave electoral ya existe en los registros',
        'curp.required' => 'El CURP es requerido',
        'type.required' => 'Debe seleccionar un tipo de coordinador',
        'ruta.required' => 'Es necesario agregar la ruta'
    ];

    protected $listeners = [
        'deleteRow' => 'Destroy',
    ];

    public function mount()
    {
        $this->search = '';
        $this->selected_id = 0;
        $this->section = '';
        $this->pageTitle = 'LISTADO';
        $this->componentName = 'SECCIÓN DE VOTANTES';
        $this->loading = 'PROCESANDO ... ';
        $this->coordinator_id = '';
        $this->agent_id = '';
        $this->activist_id = '';
        $this->name = '';
        $this->lastname = '';
        $this->tel = '';
        $this->email = '';
        $this->facebook = '';
        $this->street = '';
        $this->town_id = '';
        $this->yearold = '';
        $this->section = '';
        $this->clave = '';
        $this->curp = '';
        $this->type = '';
        $this->ruta = '';
    }

    public function render()
    {
        if($this->search)
        {
            $data = Voter::where('name', 'like', '%' . $this->search . '%')->paginate($this->pagination);
        }else{
            $data = Voter::orderBy('id', 'asc')->paginate($this->pagination);
        }

        return view('livewire.voter.component', [
            'data' => $data,
            'colonias' => Town::all(),
            'coordi' => Coordinator::all(),
            'agent' => Agent::all(),
            'activist' => Activist::all(),
            ])
                ->extends('layouts.themes.app')
                ->section('content');
    }

    public function resetUI()
    {
        $this->search = '';
        $this->selected_id = 0;
        $this->section = '';
        $this->pageTitle = 'LISTADO';
        $this->componentName = 'SECCIÓN DE VOTANTES';
        $this->loading = '';
        $this->coordinator_id = '';
        $this->agent_id = '';
        $this->activist_id = '';
        $this->name = '';
        $this->lastname = '';
        $this->tel = '';
        $this->email = '';
        $this->facebook = '';
        $this->street = '';
        $this->town_id = '';
        $this->yearold = '';
        $this->section = '';
        $this->clave = '';
        $this->curp = '';
        $this->type = '';
        $this->ruta = '';
        $this->resetValidation();
        $this->resetPage();
    }

    public function Store()
    {

        $this->validate($this->rules, $this->messages);

        Voter::create([
            'coordinator_id' => $this->coordinator_id,
            'agent_id' => $this->agent_id,
            'activist_id' => $this->activist_id,
            'name' => $this->name,
            'lastname' => $this->lastname,
            'tel' => $this->tel,
            'email' => $this->email,
            'facebook' => $this->facebook,
            'street' => $this->street,
            'town_id' => $this->town_id,
            'yearold' => $this->yearold,
            'section' => $this->section,
            'clave' => $this->clave,
            'curp' => $this->curp,
            'type' => $this->type,
            'ruta' => $this->ruta
        ]);

        $this->loading = 'Guardando...';
        sleep(2);

        $this->resetUI();
        session()->flash('message', 'Votante Anexado con exito!');
        $this->emit('item-added', 'Votante registrado Con Éxito!');
    }

    public function Editar($id)
    {
        $voter = Voter::find($id);

        $this->coordinator_id = $voter->coordinator_id;
        $this->agent_id = $voter->agent_id;
        $this->activist_id = $voter->activist_id;
        $this->name = $voter->name;
        $this->lastname = $voter->lastname;
        $this->tel = $voter->tel;
        $this->email = $voter->email;
        $this->facebook = $voter->facebook;
        $this->street = $voter->street;
        $this->town_id = $voter->town_id;
        $this->yearold = $voter->yearold;
        $this->section = $voter->section;
        $this->clave = $voter->clave;
        $this->curp = $voter->curp;
        $this->type = $voter->type;
        $this->ruta = $voter->ruta;

        $this->selected_id = $id;
    }

    public function Update()
    {
        $curp = Voter::find($this->selected_id);
        if ($curp->curp == $this->curp) {
            $this->validate($this->rulesUpdate, $this->messagesUpdate);
        }else{
            $this->validate($this->rules, $this->messages);
        }


        $voter = Coordinator::find($this->selected_id);

        $voter->update([
            'coordinator_id' => $this->coordinator_id,
            'agent_id' => $this->agent_id,
            'activist_id' => $this->activist_id,
            'name' => $this->name,
            'lastname' => $this->lastname,
            'tel' => $this->tel,
            'email' => $this->email,
            'facebook' => $this->facebook,
            'street' => $this->street,
            'town_id' => $this->town_id,
            'yearold' => $this->yearold,
            'section' => $this->section,
            'clave' => $this->clave,
            'curp' => $this->curp,
            'type' => $this->type,
            'ruta' => $this->ruta,
        ]);

        sleep(2);
        $this->loading = 'Guardando...';

        $this->resetUI();
        session()->flash('message', 'Votante Editado con exito!');
        $this->emit('item-added', 'Votante Editado Con Éxito!');
    }

    public function Destroy(Voter $voter)
    {
        $voter->delete();

        sleep(2);
        $this->loading = 'Eliminando Regstro';

        session()->flash('delete', 'Votante Eliminado con exito!');
        $this->emit('item-added', 'Votante Eliminado Con Éxito!');
        $this->resetUI();
    }
}
