<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Job;

class Search extends Component
{
    public $search;
    public $error = "No se han encontrado resultados.";
    protected $queryString = ['search'];

    public function render()
    {
        return view('livewire.search', [
            'results' => Job::where('title', 'like', '%'.$this->search.'%')->where('status', 2)->take(5)->get(),
        ]);
    }
}
