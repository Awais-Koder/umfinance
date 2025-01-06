<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\BlogView;

class BlogController extends Controller
{
    public function index(Request $request, $slug)
    {
        $fingerprint = $request->fingerprint(); // Get the device fingerprint
        $blog = Blog::where('slug', '=', $slug)->with('category.blogs')->firstOrFail();
        $existingView = BlogView::where('blog_id', $blog->id)->where('device_fingerprint', $fingerprint)->first();
        if (!$existingView) {
            BlogView::create([
                'blog_id' => $blog->id,
                'device_fingerprint' => $fingerprint,
            ]);
            $blog->increment('view_count');
        }
        return view('blog.single-blog', compact('blog'));
    }
}
