<?php

namespace App\Http\Livewire\Agent;

use App\Models\Agent;
use App\Models\Coordinator;
use App\Models\Town;
use Livewire\Component;
use Livewire\WithPagination;

class AgentController extends Component
{
    use WithPagination;

    public $name, $lastname, $tel, $email, $facebook, $address, $town_id, $yearold, $section, $clave, $curp, $type, $ruta, $coordinator_id;

    public $search, $selected_id, $pageTitle, $componentName;

    public $pagination = 10;

    protected $queryString = ['search'];

    protected $rules = [
        'name' => 'required',
        'lastname' => 'required',
        'tel' => 'required',
        'email' => 'required|email|unique:agents',
        'address' => 'required',
        'town_id' => 'required',
        'yearold' => 'required',
        'clave' => 'required',
        'curp' =>  'required|unique:agents',
        'type' => 'required',
        'ruta' => 'required',
        'coordinator_id' => 'required',
    ];

    protected $messages = [
        'name.required' => 'El nombre es requerido',
        'lastname.required' => 'Los apellidos son requeridos',
        'tel.required' => 'La telefono es requerida',
        'email.required' => 'El correo electronico es requerido',
        'email.email' => 'No tiene un formato de email valido',
        'email.unique' => 'Ya existe el usuario registrado con este correo',
        'address.required' => 'La dirección es requerida',
        'town_id.required' => 'Seleccione una colonia',
        'yearold.required' => 'Ingrese la edad',
        'clave.required' => 'La clave electoral ya existe en los registros',
        'curp.required' => 'El CURP es requerido',
        'curp.unique' => 'Ya se encuentra registrada esta clave en nuestros registros',
        'type.required' => 'Debe seleccionar un tipo de Agent',
        'ruta.required' => 'Es necesario agregar la ruta',
        'coordinator_id.required' => 'Es necesario seleccionar al coordinador',
    ];

    protected $rulesUpdate = [
        'name' => 'required',
        'lastname' => 'required',
        'tel' => 'required',
        'email' => 'required|email|unique:agents',
        'address' => 'required',
        'town_id' => 'required',
        'yearold' => 'required',
        'clave' => 'required',
        'curp' =>  'required',
        'type' => 'required',
        'ruta' => 'required',
        'coordinator_id' => 'required',
    ];

    protected $messagesUpdate = [
        'name.required' => 'El nombre es requerido',
        'lastname.required' => 'Los apellidos son requeridos',
        'tel.required' => 'La telefono es requerida',
        'email.required' => 'El correo electronico es requerido',
        'email.email' => 'No tiene un formato de email valido',
        'email.unique' => 'Ya existe el usuario registrado con este correo',
        'address.required' => 'La dirección es requerida',
        'town_id.required' => 'Seleccione una colonia',
        'yearold.required' => 'Ingrese la edad',
        'clave.required' => 'La clave electoral ya existe en los registros',
        'curp.required' => 'El CURP es requerido',
        'type.required' => 'Debe seleccionar un tipo de Agent',
        'ruta.required' => 'Es necesario agregar la ruta',
        'coordinator_id.required' => 'Es necesario seleccionar al coordinador',
    ];

    protected $listeners = [
        'deleteRow' => 'Destroy',
        'Printer',
    ];

    public function mount()
    {
        $this->search = '';
        $this->selected_id = 0;
        $this->section = '';
        $this->pageTitle = 'LISTADO';
        $this->componentName = 'SECCIÓN DE AGENTES';
        $this->name = '';
        $this->lastname = '';
        $this->tel = '';
        $this->email = '';
        $this->facebook = '';
        $this->address = '';
        $this->town_id = '';
        $this->yearold = '';
        $this->section = '';
        $this->clave = '';
        $this->curp = '';
        $this->type = '';
        $this->ruta = '';
        $this->coordinator_id = '';
    }

    public function render()
    {
        if($this->search)
        {
            $data = Agent::where('name', 'like', '%' . $this->search . '%')->paginate($this->pagination);
        }else{
            $data = Agent::orderBy('id', 'asc')->paginate($this->pagination);
        }
        return view('livewire.agent.component', [
            'data' => $data,
            'colonias' => Town::all(),
            'coordi' => Coordinator::all(),
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
        $this->componentName = 'SECCIÓN DE AGENTES';
        $this->name = '';
        $this->lastname = '';
        $this->tel = '';
        $this->email = '';
        $this->facebook = '';
        $this->address = '';
        $this->town_id = '';
        $this->yearold = '';
        $this->section = '';
        $this->clave = '';
        $this->curp = '';
        $this->type = '';
        $this->ruta = '';
        $this->coordinator_id = '';
        $this->resetValidation();
        $this->resetPage();
    }

    public function Store()
    {

        $this->validate($this->rules, $this->messages);

        Agent::create([
            'name' => $this->name,
            'lastname' => $this->lastname,
            'tel' => $this->tel,
            'email' => $this->email,
            'facebook' => $this->facebook,
            'address' => $this->address,
            'town_id' => $this->town_id,
            'yearold' => $this->yearold,
            'section' => $this->section,
            'clave' => $this->clave,
            'curp' => $this->curp,
            'type' => $this->type,
            'ruta' => $this->ruta,
            'coordinator_id' => $this->coordinator_id,
        ]);

        $this->resetUI();
        session()->flash('message', 'Agente Anexado con exito!');
        $this->emit('item-added', 'Agente registrado Con Éxito!');
    }

    public function Editar($id)
    {
        $agent = Agent::find($id);

        $this->name = $agent->name;
        $this->lastname = $agent->lastname;
        $this->tel = $agent->tel;
        $this->email = $agent->email;
        $this->facebook = $agent->facebook;
        $this->address = $agent->address;
        $this->town_id = $agent->town_id;
        $this->yearold = $agent->yearold;
        $this->section = $agent->section;
        $this->clave = $agent->clave;
        $this->curp = $agent->curp;
        $this->type = $agent->type;
        $this->ruta = $agent->ruta;
        $this->coordinator_id = $agent->coordinator_id;

        $this->selected_id = $id;
    }

    public function Update()
    {
        $curp = Agent::find($this->selected_id);
        if ($curp->curp == $this->curp) {
            $this->validate($this->rulesUpdate, $this->messagesUpdate);
        }else{
            $this->validate($this->rules, $this->messages);
        }


        $cordinador = Agent::find($this->selected_id);

        $cordinador->update([
            'name' => $this->name,
            'lastname' => $this->lastname,
            'tel' => $this->tel,
            'email' => $this->email,
            'facebook' => $this->facebook,
            'address' => $this->address,
            'town_id' => $this->town_id,
            'yearold' => $this->yearold,
            'section' => $this->section,
            'clave' => $this->clave,
            'curp' => $this->curp,
            'type' => $this->type,
            'ruta' => $this->ruta,
            'coordinator_id' => $this->coordinator_id,
        ]);

        $this->resetUI();
        session()->flash('message', 'Agente Editado con exito!');
        $this->emit('item-added', 'Agente Editado Con Éxito!');
    }

    public function Destroy(Agent $agent)
    {
        $agent->delete();
        session()->flash('delete', 'Agente Eliminado con exito!');
        $this->emit('item-added', 'Agente Eliminado Con Éxito!');
        $this->resetUI();
    }

    public function Printer()
    {
        return redirect()->route('ReportAgent');
    }
}
