<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Job;
use Livewire\WithPagination;

class JobsIndex extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    public function updatingsearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $jobs = Job::where('user_id', auth()->user()->id)
        ->where('title', 'like', '%' . $this->search . '%')
        ->latest('id')
        ->paginate();

        return view('livewire.admin.jobs-index', compact('jobs'));
    }
}
