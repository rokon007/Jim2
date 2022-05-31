<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
	 public function admin_index()
    {
		$notifications = DB::table('comments')
          ->join('users', 'comments.user_id', '=', 'users.id')
          ->select('users.name as name','users.image as image','comments.id as id','comments.comment_subject as subject1','comments.comment_text as text','comments.link as golink','comments.created_at as dt')
          ->where('comments.comment_status',1)
          ->orderBy('comments.id', 'DESC')->get();
		$unread = Comment::where('comment_status','=','1')->count();   
		
        //$notifications = DB::select("SELECT users.id, users.name, users.image, COUNT(comment_status) AS unread FROM users LEFT JOIN comments ON users.id = comments.user_id AND comments.comment_status = 0 WHERE users.id = ".Auth::id()." GROUP BY users.id, users.name, users.image");
       //return view('admin.home', compact('notifications', $notifications));
		//return view('admin.home');
		
		return view('admin.home',compact('notifications','unread'));
    }
}
