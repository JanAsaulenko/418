<?php
/**
 * Created by PhpStorm.
 * User: Ян
 * Date: 10.04.2018
 * Time: 0:39
 */

namespace App\Http\Controllers;
 use App\Http\Requests\PostRequest;
 use App\Post;
 use Illuminate\Http\Request;
 use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Storage;

 class PostController extends Controller
{
    public function index ()
    {
        $posts = Post::all();
        return view('post.index')->with('posts', $posts);
    }

     /**
      * @param Post $post
      * @return $this
      */
     function create (Post $post){
//        $image = Storage::putFile('images',$post->file('img'));

//        $this->validate($post->img,[
//         $poster= $post;
//        $image = $poster->file('img')->store('images');
//        $new_name=rand() . '.' .getClientOriginalExtension();
//        $image->move(public_path('images'),$new_name);
//        return view('post.create')->with('post', $post)->with('path',$new_name);
        return view('post.create')->with('post', $post);
    }
    function home(){
        $posts = Post::all()
            ->take(5);
           return view('post.fiveLatest')->with('posts',$posts);
    }

     /**
      * @param PostRequest $req
      * @param Post $post
      * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
      */
    function store(PostRequest $req, Post $post)
    {
        $validated = $req->validated();
        $post->create($req->all());
        \Session::flash('Sucsess','Office successfully added.');
        return  redirect('/');

    }
}
