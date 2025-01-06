<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Seo;

class HomeController extends Controller
{
    public function index()
    {
        $featureBlogs = Blog::with('category')->where(['privacy' => 'public', 'featured_article' => true])->take(5)->get();
        $blogs = Blog::with('category')->where(['privacy' => 'public', 'featured_article' => false])->latest()->take(3)->get();
        $otherBlogs = Blog::with('category')->where(['privacy' => 'public', 'featured_article' => false])->latest()->paginate(10);
        $seo = Seo::where('page' , 'home')->first();
        return view('index', compact('featureBlogs', 'blogs' , 'otherBlogs' , 'seo'));
    }
}
