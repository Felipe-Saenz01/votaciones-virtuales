<?php

namespace App\Http\Livewire;

use App\Models\Postulacion;
use Livewire\Component;

class VotingForm extends Component
{
    public $postulacion;
    public $candidatos;
    public $seleccionado;

    public function mount( Postulacion $postulacion)
    {
        $this->postulacion = $postulacion;
        $this->candidatos = $this->postulacion->candidatos;
    }



    public function render()
    {
        return view('livewire.voting-form');
    }
}


