<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\House;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    function show(Request $request)
    {
        $perPage = $request->input('perPage', 9);
        $posts_all = Post::all();
        $posts = Post::orderBy('created_at', 'desc')->paginate($perPage);
        $categories = Category::all();
        return view('blog', compact('posts', 'categories', 'posts_all'));
    }

    function show_single($id)
    {

        $categories = DB::table('posts')
            ->join('posts_categories', 'posts.post_id', '=', 'posts_categories.post_id')
            ->join('categories', 'posts_categories.category_id', '=', 'categories.category_id')
            ->where('posts.post_id', $id)
            ->select('categories.category_name')
            ->get();
        $posts_lastest = Post::orderby('created_at', 'desc')->take(3)->get();
        return view('blogsingle', compact('post', 'categories', 'posts_lastest'));
    }

    public function showPostsByCategory($categoryName)
    {

        // Находим категорию по имени
        $posts = DB::table('posts')
            ->join('posts_categories', 'posts.post_id', '=', 'posts_categories.post_id')
            ->join('categories', 'posts_categories.category_id', '=', 'categories.category_id')
            ->where('categories.category_name', $categoryName)
            ->select('posts.*')
            ->get();

        if (!$posts) {
            abort(404);
        }

        $categories = Category::all();
        return view('blog', compact('posts',  'categories'));

    }
}
