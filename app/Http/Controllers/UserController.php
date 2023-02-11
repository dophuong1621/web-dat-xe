<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use App\Models\status_user;
use Illuminate\Http\Request;
use App\Models\AcountCategory;
use App\Models\acount_category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchUser = $request->get('search');
        // $indexUser = User::where('fullname_user', 'like', '%' . $searchUser . '%')->paginate(3);
        $indexUser = User::select('*')
            ->join('acount_category', 'user.acount_category', '=', 'acount_category.acount_category_id')
            ->join('status_user', 'user.acount_status', '=', 'status_user.status_id')
            ->where('fullname_user', 'like', '%' . $searchUser . '%')
            ->paginate(3);

        $count_booking = Booking::select(DB::raw('count(booking_id) as tongDon'))
            ->where('booking.booking_status', '=', 1)
            ->get();
        $countTongDon = $count_booking[0]['tongDon'];
        return view('hethong.index ', [
            'searchUser' => $searchUser,
            'indexUser' => $indexUser,
            'count_booking' => $countTongDon

        ]);
        // return $route;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $acount_category = acount_category::all();
        $status_user = status_user::all();
        $count_booking = Booking::select(DB::raw('count(booking_id) as tongDon'))
            ->where('booking.booking_status', '=', 1)
            ->get();
        $countTongDon = $count_booking[0]['tongDon'];
        return view('hethong.create', compact('acount_category', 'status_user'), [
            'count_booking' => $countTongDon
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $name = $request->get('name');
        $user = new User();
        $user->fullname_user = $request->fullname;
        $user->email_user = $request->email;
        $user->password_user = $request->pass;
        $user->dob_user = $request->dob;
        $user->contact_user = $request->contact;
        $user->acount_category = $request->acountCategory;
        $user->acount_status = $request->acountStatus;
        $user->save();
        return Redirect::route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $user = User::find($id)
        //     ->join('acount_category', 'user.user_id', '=', 'acount_category.acount_category_id')
        //     ->first();
        $acount_category = AcountCategory::all();
        $status_user = status_user::all();
        $user =  User::join('acount_category', 'user.acount_category', '=', 'acount_category.acount_category_id')
            ->join('status_user', 'user.acount_status', '=', 'status_user.status_id')
            ->where('user.user_id', '=', $id)
            ->first();
        $count_booking = Booking::select(DB::raw('count(booking_id) as tongDon'))
            ->where('booking.booking_status', '=', 1)
            ->get();
        $countTongDon = $count_booking[0]['tongDon'];
        return view('hethong.edit', [
            'user' => $user,
            'acount_category' => $acount_category,
            'status_user' => $status_user,
            'count_booking' => $countTongDon
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->fullname_user = $request->fullnameUser;
        $user->email_user = $request->emailUser;
        $user->password_user = $request->passwordUser;
        $user->dob_user = $request->dobUser;
        $user->contact_user = $request->contactUser;
        $user->acount_category = $request->acountCategory;
        $user->acount_status = $request->acountStatus;
        $user->save();
        // dd($user);
        return Redirect::route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return Redirect::route('user.index');
    }
}
