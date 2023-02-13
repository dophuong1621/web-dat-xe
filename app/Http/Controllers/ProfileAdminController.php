<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class ProfileAdminController extends Controller
{
    public function editProfile()
    {
        $count_booking = Booking::select(DB::raw('count(id) as tongDon'))
            ->where('booking.booking_status', '=', 1)
            ->get();
        $countTongDon = $count_booking[0]['tongDon'];
        $profile = Admin::All()->first();
        // dd($profile);
        return view('admin.profile', [
            'profile' => $profile,
            'count_booking' => $countTongDon
        ]);
    }

    public function updateProfile(Request $request, $id)
    {
        $admin = Admin::find($id);
        $admin->fullname_admin = $request->fullnameAdmin;
        $admin->email_admin = $request->emailAdmin;
        $admin->password_admin = $request->passwordAdmin;
        $admin->dob_admin = $request->dobAdmin;
        $admin->contact_admin = $request->contactAdmin;
        $admin->save();
        // dd($admin);
        return Redirect::route('profile');
    }
    public function editPass()
    {
        $count_booking = Booking::select(DB::raw('count(id) as tongDon'))
            ->where('booking.booking_status', '=', 1)
            ->get();
        $countTongDon = $count_booking[0]['tongDon'];
        return view('admin.change_password', [
            'count_booking' => $countTongDon
        ]);
    }

    public function updatePass(Request $request)
    {
        $value = $request->session()->get('id');
        $admin = Admin::find($value);

        if ($request->current_password == $admin->password_admin) {
            $update = Admin::find($value);
            $update->password_admin = $request->password_confirm;
            $update->save();
            return back()->with("status", "Password changed successfully!");
        } else {
            return back()->with('error', 'Sai mật khẩu cũ ');
        }

        // dd($request->current_password);
        // dd($admin->password_admin);

        // if ($admin && Hash::check($request->current_password, $admin->password_admin)) {
        //     $update = Admin::find($value);
        //     $update->password_admin = $request->password_confirm;D
        //     $update->save();
        //     return back()->with("status", "Password changed successfully!");
        // }else{
        //     return back()->with('error', 'Sai mật khẩu cũ ');
        // }
    }

    public function forgotPass()
    {
        return view('admin.forgotPass');
    }

    public function postForgotPass(Request $request)
    {
        $request->validate([
            'email_admin' => 'required|exists:admin'
        ], [
            'email_admin.required' => 'Please enter a valid email address',
            'email_admin.exists' => 'This email does not exist'
        ]);

        // $token = strtoupper(Str::random(10));
        $admin = Admin::where('email_admin', $request->email_admin)->first();
        // $admin->update(['token' => $token]);

        Mail::send('admin.check_email_forgot', compact('admin'), function ($email) use ($admin) {
            $email->subject('Đổi mật khẩu - Lấy lại mật khẩu tài khoản');
            $email->to($admin->email_admin, $admin->fullname_admin);
        });
        // return redirect()->back()->with('yes', 'Vui lòng check email để thực hiện thay đổi mật khẩu');
        return Redirect::route('login')->with('yes', 'Bạn vui lòng check mail để thực hiện thay đổi mật khẩu');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getPass()
    {
        $admin =  Admin::all()
            ->first();
        return view('admin.getPass', [
            'admin' => $admin
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postGetPass(Request $request)
    {

        $request->validate([
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ], [
            'password.required' => 'Invalid password',
            'confirm_password.same' => 'Password incorrect'
        ]);
        $admin = Admin::where('password_admin');
        // $password_h = $request->get('password');
        $password_h = bcrypt($request->password);
        $admin->update(['password_admin' => $password_h]);
        // $admin = Admin::all();
        // $admin->password_admin = $request->get('password');
        // $admin->save();
        return redirect()->route('login')->with('yes', 'Đổi mật khẩu thành công');
    }
}
