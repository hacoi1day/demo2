<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLogin()
    {
        if(Auth::check()) {
            return redirect()->route('article.list');
        }
        return view('user.login');
    }

    public function postLogin(Request $request)
    {
        if(Auth::check()) {
            return redirect()->route('article.list');
        } else {
            $params = $request->all();
            $email = $params['email'];
            $password = $params['password'];
            if(Auth::attempt(['email' => $email, 'password' => $password])) {
                echo "đăng nhập thành công";
                return redirect()->route('article.list');
            } else {
                return redirect()->back()->with('data-old', $params);
            }
        }


    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('article.list');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getRegister()
    {
        return view('user.register');
    }

    public function postRegister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
            'passwordAgain' => 'same:password'
        ], [
            'name.min' => 'tên phải có ít nhất 4 ký tự',
            'email.unique' => 'email đã tồn tại',
            'password.min' => 'mật khẩu phải có ít nhất 4 ký tự',
            'passwordAgain.same' => 'mật khâu nhập lại không đúng',
        ]);

        $params = $request->all();
        $name = $params['name'];
        $email = $params['email'];
        $password = $params['password'];
        $passwordAgain = $params['passwordAgain'];

        $userCreate = $this->user->create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password)
        ]);
        if($userCreate) {
            return redirect()->route('get.login')->with('message', 'Đăng ký thành công');
        } else {
            return redirect()->route('get.register')->with('message', 'Đăng ký thất bại');
        }
    }
}
