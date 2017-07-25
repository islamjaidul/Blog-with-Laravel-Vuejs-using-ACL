<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $post = null;
    
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * get all posts
     * 
     * \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex()
    {
        $posts = $this->post->with('user')->get();
        return view('post.index')->with('posts', $posts);
    }

    /**
     * get post create page
     * 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    
    public function getCreatePost()
    {
        return view('post.create');
    }

    /**
     * Store post into the database
     * 
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCreate(Request $request)
    {
        $request->merge([
            'user_id' => auth()->user()->id
        ]);
        
        $post = new Post();
        $post->fill($request->all());
        $post->save();

        return redirect()->route('post.create')->with('status', 'Post created successfully!');
    }

    /**
     * get post edit page
     * 
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getEdit($id)
    {
       $post = $this->post->find($id);
       return view('post.edit')->with('post', $post);
    }

    /**
     * Update a post by id
     * 
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEdit(Request $request, $id)
    {
        $post = $this->post->find($id);
        $post->fill($request->all());
        $post->save();
        
        return redirect()->route('posts.all')->with('status', 'Post updated successfully!');
    }

    /**
     * Delete a post by Id
     * 
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getDelete($id)
    {
       $post = $this->post->find($id);
       $post->delete();

       return redirect()->route('posts.all')->with('status', 'Post deleted successfully!');
    }
}
