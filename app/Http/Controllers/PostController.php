<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /* 
    Use the middleware here if u don't want visitors to see post
    public function __construct () {
        $this->middleware(['auth']);
    }

    */


    // Responsible for showing the form
    public function index () {
        /* 
        $posts = Post::get(); Gets all data from post table

        latest() does the same as orderBy('created_at', 'desc')
        */
        // $posts = Post::latest()->with(['user', 'likes'])->paginate(7);

        /* fetch only the user post
        $posts = $user->posts()->orderBy('created_at', 'desc')->with(['user', 'likes'])->paginate(7);
        */

        //Fetches all post
        $posts = Post::orderBy('created_at', 'desc')->with(['user', 'likes'])->paginate(7);
        // dd($posts);
        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    // Responsible for signing in user
    public function store (Request $request) {
        $this->validate($request,
        [
            'body'=> 'required',
        ]);
        
        $request->user()->posts()->create($request->only('body'));
        return back();

        // $request->user()->posts()->create([
        //     'body' => $request->body,
        // ]);

        // Post::create([
        //     // 'user_id' => auth()->user()->id,
        //     'user_id' => auth()->id(),
        //     'body' => $request->body
        // ]);
        // auth()->user()->posts()->create();
    }

    public function destroy (Post $post) {

        /* 
            delete here is a function name available PostPolicy in 

            authorize is here so that if someone bypass the UI to delete, it should 
            return an unauthorize user error
        */
        $this->authorize('delete', $post);

        $post->delete();

        return back();
    }
}
