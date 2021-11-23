<?php

  
namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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

    protected $redirectTo = '/home';

   

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
        $this->validate($request, [
            'email' => 'required|email|',
            'password' => 'required',
        ]);

        $remember_me = $request->has('remember') ? true : false; 

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'),'isActive' => 1], $remember_me))
        {
            if (auth()->user()->is_admin == 1) {
                return redirect()->route('admin.home');
            }else{
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('login')
                ->with('error','Email And Password Are Wrong.');
        }

        


    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

}