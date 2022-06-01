<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Comment;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
   
     public function boot()
    {
      
         View::share('unread',Comment::where('comment_status','=','1')->count());
        View::share('notifications',DB::table('comments')
          ->join('users', 'comments.user_id', '=', 'users.id')
          ->select('users.name as name','users.image as image','comments.id as id','comments.comment_subject as subject1','comments.comment_text as text','comments.link as golink','comments.created_at as dt')
          ->where('comments.comment_status',1)
          ->orderBy('comments.id', 'DESC')->get());  

    }
}
