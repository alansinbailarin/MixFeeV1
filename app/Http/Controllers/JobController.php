<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CategoryController;

class JobController extends Controller
{
    public function index(){
        // $allCounter = Job::all()->count(); <- 'allCounter' ese va en el compact
        $counting = Job::where('status', 2)->count();

        $jobs = Job::where('status', 2)
        ->latest('id')
        ->paginate(12);

        $categorias = Category::orderBy('clicks','DESC')->limit(3)->get();

        // $categorias = Category::select('name', 'description', 'clicks')
        // ->get()
        // ->take(3);
    
        return view('jobs.index', compact('categorias', 'jobs', 'counting'));
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

    public function CategoryAVG()
    {
        $categoriesProm =DB:: select("call spSalarioCategorias()");
        return response()->json($categoriesProm);
    }

    public function SalaryTagsAVG()
    {
        $tagsProm =DB:: select("call spAVGSalarioTags()");
        return response()->json($tagsProm);
    }

    public function JobCategories()
    {
        $jobCategories =DB:: select("call spJobsCategorias()");
        return response()->json($jobCategories);
    }

    public function JobTags()
    {
        $jobTags =DB:: select("call spJobTags()");
        return response()->json($jobTags);
    }

    public function TotalTrabajos()
    {
        $total =DB:: select("call spTotalTrabajos()");
        return response()->json($total);
    }
    public function Wages()
    {
        $wage =DB:: select("call spWages()");
        return response()->json($wage);
    }  
    
    public function LatestWorks()
    {
        $LWorks =DB:: select("call spLatestWorks()");
        return response()->json($LWorks);
    }

    public function LatestCategories()
    {
        $LCategories =DB:: select("call spLatestCategories()");
        return response()->json($LCategories);
    }

    public function LatestTags()
    {
        $LTags =DB:: select("call spLatestTags()");
        return response()->json($LTags);
    }
    
}