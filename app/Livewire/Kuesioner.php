<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;


class Kuesioner extends Component
{
    public $totalSteps = 2;
    public $currentStep = 1;
    public $currentStatus = 0;
    public $regencies = [];

    public function mount()
    {
        $this->currentStep = 1;
    }

    public function increaseStep()
    {
        $this->currentStep++;
        if ($this->currentStep > $this->totalSteps) {
            $this->currentStep = $this->totalSteps;
        }
    }

    public function decreaseStep()
    {
        $this->currentStep--;
        if ($this->currentStep < 1) {
            $this->currentStep = 1;
        }
    }

    public function change_alumni_status(int $section)
    {
        $this->currentStatus = $section;
    }

    public function render()
    {
        $provinces = DB::table('provinces')->select(['id', 'name'])->get();

        return view('livewire.kuesioner', ['provinces' => $provinces]);
    }

    public function get_regencies($value)
    {
        $this->regencies = DB::table('regencies')->select(['id', 'name'])->where('province_id', '=', $value)->get();
    }
}
