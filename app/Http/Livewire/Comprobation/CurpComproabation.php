<?php

namespace App\Http\Livewire\Comprobation;

use App\Models\Activist;
use App\Models\Agent;
use App\Models\Coordinator;
use Livewire\Component;

class CurpComproabation extends Component
{
    public $curp, $message, $prueba = 0, $cordi, $agente, $activista;

    public $datos1, $datos2;

    public function mount()
    {
        $this->curp = null;
        $this->message = null;
        $this->prueba = 0;
        $this->cordi = null;
        $this->agente = null;
        $this->activista = null;
        $this->datos1 = null;
        $this->datos2 = null;
    }

    public function render()
    {
        return view('livewire.comprobation.component')
                ->extends('layouts.themes.app')
                ->section('content');
    }

    public function seek()
    {
        $buscar = Coordinator::where('curp', 'like', '%' . $this->curp . '%')->get();
        $buscar2 = Agent ::where('curp', 'like', '%' . $this->curp . '%')->get();
        $buscar3 = Activist::where('curp', 'like', '%' . $this->curp . '%')->get();
        sleep(2);
        if($buscar->count() > 0)
        {
            $this->prueba += 1;
            $this->cordi = "Coordinador";
        }
        if ($buscar2->count() > 0)
        {
            $this->prueba += 1;
            $this->agente = "Agente";
        }
        if ($buscar3->count() > 0)
        {
            $this->prueba += 1;
            $this->activista = "Activista";
        }
        if($this->prueba == 0)
        {
            return redirect()->route('indexVotantes');
        }else{
            $this->emit('error', 'Ya esta registrado en el padron!, como: ' . $this->cordi . ' ' . $this->agente . ' ' . $this->activista );
            $this->resetUI();
        }
    }

    public function resetUI()
    {
        $this->curp = null;
        $this->message = null;
        $this->prueba = 0;
        $this->cordi = null;
        $this->agente = null;
        $this->activista = null;
        $this->datos1 = null;
        $this->datos2 = null;
    }

}
