<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Mockery\Undefined;

use function PHPUnit\Framework\isEmpty;

class Kuesioner extends Component
{
    public $totalSteps = 2;
    public $currentStep = 1;
    public $currentStatus = 0;
    public $regencies = [];
    public ?object $kuesioner = null;
    public ?object $work = null;
    public ?object $education = null;

    public function mount($kuesioner = null, $work = null, $education = null)
    {
        $this->currentStep = 1;
        if (isset($kuesioner)) $this->kuesioner = (object)$kuesioner;
        if (isset($work)) {
            $this->work = (object)$work;
            $this->get_regencies($this->work->kuesioner_work->company_province);
        };
        if (isset($education)) $this->education = (object)$education;
        // dd(
        //     $this->kuesioner,
        //     $this->work,
        //     $this->education
        // );
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

    public function get_regencies(int $value)
    {
        $this->regencies = DB::table('regencies')->select(['id', 'name'])->where('province_id', '=', $value)->get();
    }
}
