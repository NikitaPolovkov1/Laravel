<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::where('is_published', 1)->first();
        dump($posts);
        dd('end');
    }
    public function create()
    {
        $postsArr=[
            [
                'title' => 'svfvsv of',
                'content' => 'sdjflksjdfj',
                'image' => 'sldkjflskjfd',
                'likes' => 20,
                'is_published' => 1
            ],
            [
                'title' => 'another Title of',
                'content' => 'another sdjflksjdfj',
                'image' => 'sldkjflskjfd',
                'likes' => 22,
                'is_published' => 1
            ]
        ];
        foreach ($postsArr as $item){
            Post::create($item);
        }

        dump('created');
    }

    public function update()
    {
        $post = Post::find(5);
        $post->update([
            'title' => 'updated2',
            'content' => 'updated2'
        ]);

        dd('update');
    }

    public function delete()
    {
        $post = Post::withTrashed()->find(1);
        $post->delete();//restore - восстановление, delete - удаление
        dd('deleted');
    }

    public function firstOrCreate()
    {
        $anotherPost =  [
            'title' => 'anodd',
            'content' => 'another sfs',
            'image' => 'wef',
            'likes' => 50000,
            'is_published' => 1
        ];
        $post = Post::firstOrCreate([
            'title' => 'svfvsv of'//ключи по которым не могут быть совпадения, например id title и тд.
        ], [
            'title' => 'svfvsv of',
            'content' => 'another sfs',
            'image' => 'wef',
            'likes' => 50000,
            'is_published' => 1
        ]);
        dump($post->content);
        dd('create');
        //first or create - метод, который либо создаст,либо выкинет уже существующее
    }

    public function updateOrCreate(){

        $anotherPost =  [
            'title' => 'upanodd',
            'content' => 'another sfs',
            'image' => 'wef',
            'likes' => 50000,
            'is_published' => 0
        ];
        $post = Post::updateOrCreate([
            'title' => 'svfvsv of'
        ], [
            'title' => 'svfvsv of',
            'content' => 'another sfs',
            'image' => 'wef',
            'likes' => 500,
            'is_published' => 1
        ]);
        dump($post->content);

        dd('update');
        //update or create - метод, который либо обновляет либо создаёт, т.е. если есть такой ключ, то он обновит остальные поля, если нет создаст новую строку
    }
}
