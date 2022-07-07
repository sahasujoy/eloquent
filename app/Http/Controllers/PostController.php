<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function addPost()
    {
        return view('add-post');
    }

    public function createPost(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $result =  $post->save();
        if($result)
        {
            return back()->with('Post_Created', 'Post has been created successfully!');
        }
        else
        {
            return back()->with('Post_Created', 'Post has not created successfully!');
        }
    }

    public function getPost()
    {
        $post = Post::orderBy('id', 'desc')->get();
        return view('posts', compact('post'));
    }

    public function getPostById($id)
    {
        $post = Post::where('id', $id)->first();
        return view('single-post', compact('post'));
    }

    public function deletePost($id)
    {
        Post::where('id', $id)->delete();
        return back()->with('post_deleted', 'Post has been deleted successfully');
    }

    public function editPost($id)
    {
        $post = Post::find($id);
        return view('edit-post', compact('post'));
    }

    public function updatePost(Request $request)
    {
        $post = Post::find($request->id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->update();
        return back()->with('post_edited', 'Post has been updated successfully');
    }
}
