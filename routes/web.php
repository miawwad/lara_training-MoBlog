<?php
use App\Models\Post;
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
        'posts' => Post::all()
    ]); //view is smth the user sees
    //matches posts in views file and don't need to do posts.blade.php
});

Route::get('posts/{post}',function($slug) {
    //find a post by it's slug and pass it to a view called "post"

    return view('post', [
        'post'=> Post::findOrFail($slug)
    ]);
    //for this to work we need a class of post, which we create inside app folder, inside models
});

