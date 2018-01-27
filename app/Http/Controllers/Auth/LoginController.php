<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Student;
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

    public function logout(Request $request) {
        Auth::guard('student')->logout();
        return redirect('/');
    }

    public function authenticateStudent(Request $request)
    {

        $this->validate($request, [            
            'nim' => 'required',
            'password' => 'required'
        ]);

        $nim = $request->input('nim');
        $password = $request->input('password');
        $remember = $request->input('remember');
        $credentials = [
        'nim' => $nim, 
        'password' => $password,
        ];        

        if(!Student::whereNim($nim)->count()){
            return back()->with('error', 'Nim tidak ditemukan');
        }
        if (Auth::guard('student')->attempt($credentials, $remember)){
            return redirect()->route('dashboard');
        }else{
            return back()->with([
                'error' => 'Password Salah',
                'nim' => $nim,
            ]);
        }
    }
}
