<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;
use App\Services\AdminService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use View;
use Auth;

class AdminController extends Controller
{
    private $adminService;

    public function __construct()
    {
        $this->adminService = new AdminService();
    }

    public function showLoginForm()
    {
        return View::make('admin.login');
    }

    public function processLoginAdmin(Request $request)
    {
        //TODO validation request
        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
            return Redirect::to('/');
        } else {
            Session::flash('message-error', 'Email hoặc mật khẩu sai!');
            return Redirect::to('login');
        }
    }

    public function logout()
    {
        Session::flash('message-success', 'Bạn đã đăng xuất khỏi hệ thống biểu mẫu.');
        Auth::logout();
        return Redirect::to('login');
    }

    public function renderChangePasswordView()
    {
        return View::make('admin.passwords.reset');
    }

    public function processChangePassword(Request $request)
    {
        if($request->get('old_password') == null || $request->get('new_password') == null || $request->get('confirm_password') == null) {
            Session::flash('message_danger', 'All fields are required.');
            return Redirect::to('password/reset');
        }

        if($this->adminService->loadValidatePassword($request->get('old_password'), $request->get('new_password'), $request->get('confirm_password'), $this->getAdminId())) {
            Session::flash('message_success', 'Mật khẩu của bạn đã được thay đổi.');
            return Redirect::to('password/reset');

        } else {
            Session::flash('message_danger', 'Bạn viết sai mật khẩu!');
            return Redirect::to('password/reset');
        }
    }
}
