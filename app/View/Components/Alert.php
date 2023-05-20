<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    public $clases, $classIcon;
    /**
     * Create a new component instance.
     */
    public function __construct($type = 'success')
    {
    
        switch ($type) {
            case 'success':
                $this->clases="bg-green-100 border border-green-400 text-green-700";
                $this->classIcon="text-green-700";
                break;

            case 'primary':
                    $this->clases="bg-blue-100 border border-blue-400 text-blue-700";
                    $this->classIcon="text-blue-700";
                    break;

            case 'error':
                $this->clases="bg-red-100 border border-red-400 text-red-700";
                $this->classIcon="text-red-700";
                break;

            
            default:
                $this->clases="bg-yellow-100 border border-yellow-400 text-yellow-700";
                $this->classIcon="text-yellow-700";
                break;
        }


    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert');
    }
}
