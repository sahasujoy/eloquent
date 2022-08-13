<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function addPost()
    {
        $category = Category::orderBy('id', 'desc')->get();
        return view('add-post', compact('category'));
    }

    public function createPost(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        // $category_id = $request->get('category');
        // dd($category_id);

        $result =  $post->save();
        $catids = $request->cat;
        $post->categories()->attach($catids);
        if($result)
        {
            return redirect('/posts')->with('Post_Created', 'Post has been created successfully!');
        }
        else
        {
            return redirect('/posts')->with('Post_Created', 'Post has not created successfully!');
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
        return  redirect('/posts')->with('post_edited', 'Post has been updated successfully');
    }

    public function getCatByPost($id)
    {
        $post = Post::find($id);
        $cats = $post->categories;
        return $cats;
    }

    public function getPostByCat($id)
    {
        $cat = Category::find($id);
        $posts = $cat->posts;
        return $posts;
    }
}
