<?php

namespace App\Http\Livewire\Coordinator;

use App\Models\Coordinator;
use App\Models\Town;
use Livewire\Component;
use Livewire\WithPagination;

class CoordinatorController extends Component
{
    use WithPagination;

    public $search, $selected_id, $pageTitle, $componentName;

    public $name, $lastname, $tel, $email, $facebook, $address, $town_id, $yearold, $section, $clave, $curp, $type, $ruta;

    public $pagination = 10;

    protected $queryString = ['search'];

    protected $rules = [
        'name' => 'required',
        'lastname' => 'required',
        'tel' => 'required',
        'email' => 'required|email|unique:coordinators',
        'address' => 'required',
        'town_id' => 'required',
        'yearold' => 'required',
        'clave' => 'required',
        'curp' =>  'required|unique:coordinators',
        'type' => 'required',
        'ruta' => 'required'
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
        'type.required' => 'Debe seleccionar un tipo de coordinador',
        'ruta.required' => 'Es necesario agregar la ruta'
    ];

    protected $rulesUpdate = [
        'name' => 'required',
        'lastname' => 'required',
        'tel' => 'required',
        'email' => 'required|email|unique:coordinators',
        'address' => 'required',
        'town_id' => 'required',
        'yearold' => 'required',
        'clave' => 'required',
        'curp' =>  'required',
        'type' => 'required',
        'ruta' => 'required'
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
        'type.required' => 'Debe seleccionar un tipo de coordinador',
        'ruta.required' => 'Es necesario agregar la ruta'
    ];

    protected $listeners = [
        'deleteRow' => 'Destroy',
        'Printer'
    ];

    public function mount()
    {
        $this->search = '';
        $this->selected_id = 0;
        $this->section = '';
        $this->pageTitle = 'LISTADO';
        $this->componentName = 'SECCIÓN DE COORDINADORES';
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
    }

    public function render()
    {
        if($this->search)
        {
            $data = Coordinator::where('name', 'like', '%' . $this->search . '%')->paginate($this->pagination);
        }else{
            $data = Coordinator::orderBy('id', 'asc')->paginate($this->pagination);
        }
        return view('livewire.coordinator.component', ['data' => $data, 'colonias' => Town::all()])
                ->extends('layouts.themes.app')
                ->section('content');
    }

    public function resetUI()
    {
        $this->search = '';
        $this->selected_id = 0;
        $this->section = '';
        $this->pageTitle = 'LISTADO';
        $this->componentName = 'SECCIÓN DE COORDINADORES';
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
        $this->resetValidation();
        $this->resetPage();
    }

    public function Store()
    {

        $this->validate($this->rules, $this->messages);

        Coordinator::create([
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
            'ruta' => $this->ruta
        ]);

        $this->resetUI();
        session()->flash('message', 'Coordinador Anexado con exito!');
        $this->emit('item-added', 'Coordinador registrado Con Éxito!');
    }

    public function Editar($id)
    {
        $cordi = Coordinator::find($id);

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

        $this->selected_id = $id;
    }

    public function Update()
    {
        $curp = Coordinator::find($this->selected_id);
        if ($curp->curp == $this->curp) {
            $this->validate($this->rulesUpdate, $this->messagesUpdate);
        }else{
            $this->validate($this->rules, $this->messages);
        }


        $cordinador = Coordinator::find($this->selected_id);

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
        ]);

        $this->resetUI();
        session()->flash('message', 'Coordinador Editado con exito!');
        $this->emit('item-added', 'Coordinador Editado Con Éxito!');
    }

    public function Destroy(Coordinator $cordinador)
    {
        $cordinador->delete();
        session()->flash('delete', 'Coordinador Eliminado con exito!');
        $this->emit('item-added', 'Coordinador Eliminado Con Éxito!');
        $this->resetUI();
    }

    public function Printer()
    {
        return redirect()->route('ReportCoordinador');
    }
}
