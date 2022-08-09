<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Http;
use Illuminate\Support\Facades\DB;

class ConsultaController extends Controller
{
    public function index(){
        $jobCategories =DB:: select("call spJobsCategorias()");
        $jobTags =DB:: select("call spJobTags()");
        $userCounted = User::all()->count();
        $categoryCounted = Category::all()->count();
        $tagCounted = Tag::all()->count();
        $allCounter = Job::all()->count();
        $wage =DB:: select("call spWages()");

        return view("admin.index",["data2"=>json_encode($jobCategories),"data"=>json_encode($jobTags)], compact('allCounter', 'userCounted', 'categoryCounted', 'tagCounted', 'wage'));
        
    }
}
