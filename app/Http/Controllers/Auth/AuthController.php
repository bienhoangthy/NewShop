<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Auth;
use Hash;
use Request;
use Mail;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    protected $redirectAfterLogout = 'auth/login';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'getLogout']);
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function getLogin() {
        return view('auth.login');
    }

    public function postLogin(LoginRequest $request) {
        $login = array(
            'name' => $request->txtUsername,
            'password' => $request->txtPassword
            );

        if (Auth::attempt($login)) {
            if (Auth::user()->role == 1) {
                return redirect()->route('admin.getDashboard');
            } else {
                return redirect('/');
            }
        } else {
            return redirect()->back()->with(['flash_return'=>'ERROR:','flash_status'=>'danger','flash_message'=>'Tên Đăng Nhập hoặc Mật Khẩu không chính xác!']);
        }
    }

    public function getRegister() {
        return view('auth.register');
    }

    public function postRegister(RegisterRequest $request) {
        $user = new User();
        $user->name = $request->txtUser;
        $user->fullname = $request->txtUser;
        $user->email = $request->txtEmail;
        $user->password = Hash::make($request->txtPass);
        $user->role = 2;
        $user->remember_token = $request->_token;
        $user->save();

        Mail::send('front.mail.mail', ['user' => $user], function ($m) use ($user) {
            $m->from('thybien93@gmail.com', 'NewShop');
            $m->to($user->email, $user->fullname)->subject('Chào mừng bạn đến với NewShop!');
            });

        return redirect('/auth/login')->with(['flash_return'=>'COMPLETE:','flash_status'=>'success','flash_message'=>"Tài khoản $user->name đã tạo thành công, sẵn sàng Đăng Nhập!"]);
    }

    public function getLogut() {
        if (Auth::check()) {
            Auth::logout();
        }
    }
}
