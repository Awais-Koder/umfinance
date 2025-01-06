<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Blog;

class DefaultService
{
    public static function getCategories()
    {
        return Category::with('blogs')->get();
    }
    public static function getPopularCategories()
    {
        return Category::with('blogs')->has('blogs', '>', 0)->get();
    }
    public static function recentBlogs()
    {
        return Blog::where(['privacy' => 'public', 'featured_article' => false])->latest()->take(3)->get();
    }
    public static function popularPosts()
    {
        $blogs = Blog::where(['privacy' => 'public', 'featured_article' => false])
            ->where('view_count', '>', 0)
            ->orderBy('view_count', 'desc') // Sort by view_count in descending order
            ->take(3) // Limit to 3 results
            ->get();
        return $blogs;

    }
}
