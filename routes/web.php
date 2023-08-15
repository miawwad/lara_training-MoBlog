<?php
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    //those array_map and collect do the exact same thing but you will like collect more for some reason.
    // $posts = array_map(function($file){
    //     $document = YamlFrontMatter::parseFile($file);
    //     return new Post(
    //         $document->title,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body(),
    //         $document->slug
    //     );
    // },$files);

    return view('posts',[
        'posts' => Post::latest()->with('category', 'author')->get()
    ]); //view is smth the user sees
    //matches posts in views file and don't need to do posts.blade.php
});
// why does putting Post $post work, istead of id?
//becuase when you type hint laravel automatically figures out what you are trying to do by matching it with the wildcard name.
Route::get('posts/{post:slug}',function(Post $post) {
    //find a post by it's slug and pass it to a view called "post"

    return view('post', [
        'post'=> $post
    ]);
    //for this to work we need a class of post, which we create inside app folder, inside models
});

Route::get('categories/{category:slug}', function (Category $category){
    return view('posts', [
        'posts'=> $category->posts
    ]);
});

Route::get('authors/{author:username}', function (User $author){

    return view('posts', [
        'posts'=> $author->posts
    ]);
});

