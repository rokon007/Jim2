<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\CustomerInfo;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
	 
	 /**
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
			'roll'=> $data['roll'],
		    'mobile'=> $data['mobile'],
		    'image'=> $data['image'],
        ]);
    }
	 */
	 
	protected $request;

    public function __contruct(Request $request)
    {
      $this->request = $request;
    }
	protected function create(Request $request, array $data )
    {
       if (CustomerInfo::where('customer_phone', '=', Input::get('mobile'))->exists()) {
   // user found

         $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
			'roll'=> $data['roll'],
		    'mobile'=> $data['mobile'],
		    'image'=> $data['image'],
        ]);

      $file = $this->request->file('image');
      $thumbnail_path = public_path('uploads/propic/thumbnail/');
      $original_path = public_path('uploads/propic/original/');
      $file_name = 'user_'. $user->id .'_'. str_rand(32) . '.' . $file->getClientOriginalExtension();
        Image::make($file)
              ->resize(261,null,function ($constraint) {
                $constraint->aspectRatio();
                 })
              ->save($original_path . $file_name)
              ->resize(90, 90)
              ->save($thumbnail_path . $file_name);

      $user->update(['image' => $file_name]);
      return $user;
  }else{
     return redirect()->back()->with('message','Mobile is not registerd');
  }
    }
}
