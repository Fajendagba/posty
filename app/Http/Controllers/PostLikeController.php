<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function __construct () {
        $this->middleware(['auth']);
    }

    public function store(Post $post, Request $request) {
        // In situation where there is no Request, just use auth()->user
        // dd($post->likedBy($request->user()));

        if ($post->likedBy($request->user())) {
            return response(null, 409);
        }

        $post->likes()->create([
            'user_id' => $request->user()->id,
        ]);
        return back();
    }
    public function destroy (Post $post, Request $request) {
        // $company_id = Company::where('user_id', $user_id)->first();
        
        $request->user()->likes()->where('post_id', $post->id)->delete();
        return back();
    }
}
