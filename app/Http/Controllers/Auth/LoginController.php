<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
	 public function login(Request $request)
    {

            $validated = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){

               // yes its user
                if(auth()->user()->roll==1){
                    //its an admin
                    return redirect()->route('admin.home');
                }
				elseif(auth()->user()->roll==2){
					//its a SR
                    return redirect()->route('SR.home');
				}
				elseif(auth()->user()->roll==3){
					//its a Delevery man
                    return redirect()->route('DM.home');
				}
                elseif(auth()->user()->roll==4){
                    //its a Delevery man
                    return redirect()->route('customer.home');
                }
                else{
                   // its normal user
                    return redirect()->route('home');
                }
                
            }
            else{
                //invalid credential
                return redirect()->route('login')->with('error','Invalid Credential');
            }


    }
}
