<?php

namespace App\Http\Controllers;

use Exception;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AuthenticateController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function loginProcess(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');

        try {
            $login = Admin::where('email_admin', $email)->where('password_admin', $password)
                ->firstOrFail();
            $request->session()->put('id', $login->id);
            $request->session()->put('fullName', $login->fullname_admin);
            return Redirect::route('statisticals-revenue');
        } catch (Exception $e) {
            return Redirect::route("login")->with('error', [
                "message" => 'Đăng nhập thất bại',
                "email" => $email,
            ]);
        }
    }
    public function logout(Request $request)
    {
        // xoá session
        $request->session()->flush();
        //điều hướng
        return Redirect::route("login");
    }
}
