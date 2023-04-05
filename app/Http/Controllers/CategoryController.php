<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    //
    public function index(Category $category)
    {
    return view('categories.index')->with(['posts' => $category->getByCategory()]);
    }
    
}
