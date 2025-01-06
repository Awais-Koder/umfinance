<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Crypt;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index($id)
    {
        $decryptedId = Crypt::decrypt($id);
        $category = Category::findOrFail($decryptedId);
        $CatBlogs = $category->blogs()->paginate(10);
        return view('categories.categories' , compact('category','CatBlogs'));
    }
}
