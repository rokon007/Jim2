<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    public function authenticated()
    {
        if(Auth::user()->is_superuser ='1')//Admin==1
        {
          
            return view('admin.dashboard')->with('status','Welcome to Admin Dashboard');
        }
        else
        {
            if(Auth::user()->rolr_as =NULL)//User==0
            {
               return redirect('/home')->with('status','Login In Successful');
			   // return redirect('admin/dashboard')->with('status','Welcome to Admin Dashboard');
            }
            else
        {
            return redirect('/');
        }
            
        }
        
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
