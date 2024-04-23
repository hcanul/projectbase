<?php

namespace App\Http\Livewire\Activist;

use App\Models\Activist;
use App\Models\Agent;
use App\Models\Town;
use Livewire\Component;
use Livewire\WithPagination;

class ActivistController extends Component
{
    use WithPagination;

    public $name, $lastname, $tel, $email, $facebook, $address, $town_id, $yearold, $section, $clave, $curp, $type, $ruta, $agent_id;

    public $search, $selected_id, $pageTitle, $componentName;

    public $pagination = 10;

    protected $queryString = ['search'];

    protected $rules = [
        'name' => 'required',
        'lastname' => 'required',
        'tel' => 'required',
        'email' => 'required|email|unique:activists',
        'address' => 'required',
        'town_id' => 'required',
        'yearold' => 'required',
        'clave' => 'required',
        'curp' =>  'required|unique:activists',
        'type' => 'required',
        'ruta' => 'required',
        'agent_id' => 'required',
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
        'type.required' => 'Debe seleccionar un tipo de Aactivist',
        'ruta.required' => 'Es necesario agregar la ruta',
        'agent_id.required' => 'Debe seleccionar un agente',
    ];

    protected $rulesUpdate = [
        'name' => 'required',
        'lastname' => 'required',
        'tel' => 'required',
        'email' => 'required|email|unique:activists',
        'address' => 'required',
        'town_id' => 'required',
        'yearold' => 'required',
        'clave' => 'required',
        'curp' =>  'required',
        'type' => 'required',
        'ruta' => 'required',
        'agent_id' => 'required',
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
        'type.required' => 'Debe seleccionar un tipo de Activist',
        'ruta.required' => 'Es necesario agregar la ruta',
        'agent_id.required' => 'Debe seleccionar un agente',
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
        $this->componentName = 'SECCIÓN DE ACTIVISTAS';
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
        $this->agent_id = '';
    }

    public function render()
    {
        if($this->search)
        {
            $data = Activist::where('name', 'like', '%' . $this->search . '%')->paginate($this->pagination);
        }else{
            $data = Activist::orderBy('id', 'asc')->paginate($this->pagination);
        }
        return view('livewire.activist.component', [
            'data' => $data,
            'colonias' => Town::all(),
            'agent' => Agent::all(),
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
        $this->componentName = 'SECCIÓN DE ACTIVISTAS';
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
        $this->agent_id = '';
        $this->resetValidation();
        $this->resetPage();
    }

    public function Store()
    {

        $this->validate($this->rules, $this->messages);

        Activist::create([
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
            'agent_id' => $this->agent_id,
        ]);

        sleep(2);

        $this->resetUI();
        session()->flash('message', 'Activista Anexado con exito!');
        $this->emit('item-added', 'Activista registrado Con Éxito!');
    }

    public function Editar($id)
    {
        $cordi = Activist::find($id);

        $this->name = $cordi->name;
        $this->lastname = $cordi->lastname;
        $this->tel = $cordi->tel;
        $this->email = $cordi->email;
        $this->facebook = $cordi->facebook;
        $this->address = $cordi->address;
        $this->town_id = $cordi->town_id;
        $this->yearold = $cordi->yearold;
        $this->section = $cordi->section;
        $this->clave = $cordi->clave;
        $this->curp = $cordi->curp;
        $this->type = $cordi->type;
        $this->ruta = $cordi->ruta;
        $this->agent_id = $cordi->agent_id;

        $this->selected_id = $id;
    }

    public function Update()
    {
        $curp = Activist::find($this->selected_id);
        if ($curp->curp == $this->curp) {
            $this->validate($this->rulesUpdate, $this->messagesUpdate);
        }else{
            $this->validate($this->rules, $this->messages);
        }


        $activista = Activist::find($this->selected_id);

        $activista->update([
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
            'agent_id' => $this->agent_id,
        ]);

        sleep(2);

        $this->resetUI();
        session()->flash('message', 'Activista Editado con exito!');
        $this->emit('item-added', 'Activista Editado Con Éxito!');
    }

    public function Destroy(Activist $activista)
    {
        $activista->delete();
        session()->flash('delete', 'Activista Eliminado con exito!');
        $this->emit('item-added', 'Activista Eliminado Con Éxito!');
        $this->resetUI();
    }
}
