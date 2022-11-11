<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getLastCategories(Category $category){
        $categories = Category::where('category_id', $category->id)
        ->latest('id')
        ->paginate(5);

        return view('jobs.index', compact('categories', 'category'));
    }
}
