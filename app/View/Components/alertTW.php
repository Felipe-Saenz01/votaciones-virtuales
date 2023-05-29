<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class alertTW extends Component
{
    //propiedad publica para que cualquiera pueda acceder a esta
    public $tipoInfo;
    /**
     * Create a new component instance.
     */
    public function __construct($tipo  = 'info' )
    {
        switch ($tipo) {
            case 'info':
                $tipoInfo = 'bg-teal-100 border-teal-600 text-teal-900';
                break;
            case 'danger':
                $tipoInfo = 'bg-orange-100 border-orange-600 text-orange-900';
               break;
            
            default:
                $tipoInfo = 'bg-teal-100 border-teal-600 text-teal-900';
                break;
        }
        //asignacion de la variable
        $this->tipoInfo = $tipoInfo;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert-t-w');
    }
}
