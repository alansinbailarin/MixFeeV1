<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Tag;

class JobController extends Controller
{
    public function index(){
        // $allCounter = Job::all()->count(); <- 'allCounter' ese va en el compact
        $counting = Job::where('status', 2)->count();
        $jobs = Job::where('status', 2)->latest('id')->paginate(12);

        return view('jobs.index', compact('jobs', 'counting'));
    }
    public function show(Job $job){

        $similares = Job::where('category_id', $job->category_id)
        ->where('id', '!=', $job->id)
        ->where('status', 2)
        ->latest('id')
        ->take(5)
        ->get();

        return view('jobs.show', compact('job', 'similares'));
    }

    public function category(Category $category){
        $jobs = Job::where('category_id', $category->id)
        ->where('status', 2)
        ->latest('id')
        ->paginate(4);

        return view('jobs.category', compact('jobs', 'category'));
        
    }
    
    public function tag(Tag $tag){
        $jobs = $tag->jobs()->where('status', 2)->latest('id')->paginate(4);

        return view('jobs.tag', compact('jobs', 'tag'));
    }

}
