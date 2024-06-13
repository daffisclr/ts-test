<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Kuesioner extends Component
{
    public $totalSteps = 2;
    public $currentStep = 1;

    public function mount()
    {
        $this->currentStep = 1;
    }

    public function increaseStep()
    {
        $this->currentStep++;
        if($this->currentStep > $this->totalSteps)
        {
            $this->currentStep = $this->totalSteps;
        }
    }

    public function decreaseStep()
    {
        $this->currentStep--;
        if($this->currentStep < 1)
        {
            $this->currentStep = 1;
        }
    }

    public function render()
    {

        return view('livewire.kuesioner');
    }

}
