<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Model\User;
use App\Model\UserLog;


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

    /**
     * 登录页面
     */
    public function getLogin()
    {
        return view('auth.login');
    }

    /**
     * 登录操作
     */
    public function postLogin(Request $request)
    {

        $username = trim(strval($request->input('username')));
        $password = strval($request->input('password'));

        if (empty($username) or empty($password)) {

            return response('用户名和密码不能为空', 500);
        }

        if (isMobile($username)) {
            $user = User::where('mobile', $username)->first();
        } elseif (isEmail($username)) {
            $user = User::where('email', $username)->first();
        } else {
            $user = User::where('username', $username)->first();
        }
        if (empty($user)) {

            return response('无效的用户', 500);
        }
        if (!\Hash::check($password, $user->password)) {
            return response('密码错误', 500);
        }

        // 记录登录日志
        $log = new UserLog;
        $log->user_id = $user->id;
        $log->login_ip = ip2long($request->getClientIp());
        $log->login_at = time();
        $log->save();

        \Auth::login($user);
        return response('true');

    }
}
