<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Job;

class Search extends Component
{
    public $search;
    public $error = "No se han encontrado resultadios.";

    public function render()
    {
        return view('livewire.search');
    }

    public function getResultsProperty(){

        if($this->search != null) {
            return Job::where('title', 'LIKE', '%' . $this->search . '%')->where('status', 2)->take(5)->get();
        }
        else {
            return $this->error;
        }
    }
}
