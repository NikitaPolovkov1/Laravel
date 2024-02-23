<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    function show()
    {
        $posts = Post::all();
        return view('blog', compact('posts'));
    }

    function show_single($id)
    {
        $post = Post::where('post_id', $id)->first();
        $posts = Post::all();
        $categories = DB::table('posts')
            ->join('posts_categories', 'posts.post_id', '=', 'posts_categories.post_id')
            ->join('categories', 'posts_categories.category_id', '=', 'categories.category_id')
            ->where('posts.post_id', $id)
            ->select('categories.category_name')
            ->get();
        return view('blogsingle', compact('post', 'categories', 'posts'));
    }

    public function showPostsByCategory($categoryName)
    {
        // Находим категорию по имени
        $posts = DB::table('posts')
            ->join('posts_categories', 'posts.post_id', '=', 'posts_categories.post_id')
            ->join('categories', 'posts_categories.category_id', '=', 'categories.category_id')
            ->where('posts_categories.category_name', $categoryName)
            ->select('posts.*')
            ->get();

        // Если категория не найдена, можно вернуть сообщение об ошибке или перенаправить на другую страницу
        if (!$posts) {
            abort(404);
        }

        // Получаем все посты, относящиеся к данной категории

        // Передаем переменные в представление
        return view('blog', compact('posts'));
    }
}
