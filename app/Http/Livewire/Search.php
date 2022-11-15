<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Job;

class Search extends Component
{
    public $search;
    public $error = "No se han encontrado resultados.";

    public function render()
    {
        return view('livewire.search');
    }

    public function getResultsProperty(){
        if($this->search != null) {
            $this->validate([
                "search" => "min:2"
            ]);
            return Job::where('title', 'LIKE', '%' . trim($this->search) . '%')->where('status', 2)->take(5)->get();
        }
        else {
            return $this->error;
        }
    }
}
