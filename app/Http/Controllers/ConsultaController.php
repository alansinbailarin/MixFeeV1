<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;
use DB;
class ConsultaController extends Controller
{
    public function index(){
        $jobCategories =DB:: select("call spJobsCategorias()");
        $jobTags =DB:: select("call spJobTags()");
        return view("jobs.consulta",["data2"=>json_encode($jobCategories),"data"=>json_encode($jobTags)]);
        
    }
}
