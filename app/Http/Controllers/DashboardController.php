<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    private $request = null;
    private $user = null;
    private $post = null;
    
    public function __construct(Request $request, User $user, Post $post)
    {
        $this->request = $request;
        $this->user = $user;
        $this->post = $post;
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalPost = $this->post->count();
        $totalUser = $this->user->byIsNotSuperMan()->count();
        
        $data = [
            'totalPost' => $totalPost,
            'totalUser' => $totalUser
        ];
        return view('home', $data);
    }

    /**
     * get all users except admin
     * 
     * @return mixed
     */
    public function getAllUser()
    {
        $users = $this->user->byIsNotSuperMan()->get();
        return view('user.index')->with('users', $users);
    }

    /**
     * Delete a user by Id
     * 
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getDeleteUser($id)
    {
        $user = $this->user->find($id);
        $user->delete();

        return redirect()->route('users.all')->with('status', 'User Deleted Successfully!');
    }
    
    
}
