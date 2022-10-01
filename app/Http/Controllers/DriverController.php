<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Garage;
use App\Models\Gender;
use App\Models\Booking;
use App\Models\StatusDriver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $searchDriver = $request->get('search');
        $indexDriver = Driver::join('status_driver', 'driver.status_driver', '=', 'status_driver.status_driver_id')
            ->join('garage', 'garage.garage_id', '=', 'driver.driver_garage')
            ->join('gender', 'gender.gender_id', '=', 'driver.gender_driver')
            ->where('fullname_driver', 'like', '%' . $searchDriver . '%')
            ->paginate(3);
        // dd($indexDriver);
        $count_booking = Booking::select(DB::raw('count(booking_id) as tongDon'))
            ->where('booking.booking_status', '=', 1)
            ->get();
        $countTongDon = $count_booking[0]['tongDon'];
        return view('driver.index ', [
            'searchDriver' => $searchDriver,
            'indexDriver' => $indexDriver,
            'count_booking' => $countTongDon
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $garage = Garage::all();
        $statusDriver = StatusDriver::all();
        $gender = Gender::all();
        $count_booking = Booking::select(DB::raw('count(booking_id) as tongDon'))
            ->where('booking.booking_status', '=', 1)
            ->get();
        $countTongDon = $count_booking[0]['tongDon'];
        return view('driver.create', compact('garage', 'statusDriver', 'gender'), [
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
        $image = $request->file('image');

        $nameImage = $image->getClientOriginalName();
        $LuuAnh = 'assets/image/driver';
        $image->move($LuuAnh, $nameImage);


        $driver = new Driver();
        $driver->fullname_driver = $request->fullname;
        $driver->dob_driver = $request->dob;
        $driver->gender_driver = $request->gender;
        $driver->contact_driver = $request->contact;
        $driver->email_driver = $request->email;
        $driver->driver_image = $LuuAnh . '/' . $nameImage;
        $driver->driver_garage = $request->garage;
        $driver->status_driver = $request->statusDriver;
        $driver->save();
        return Redirect::route('driver.index');
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
        $driverGarage = Garage::all();
        $driverStatus = StatusDriver::all();
        $driverGender = Gender::all();
        $driver =  Driver::join('garage', 'driver.driver_garage', '=', 'garage.garage_id')
            ->join('gender', 'gender.gender_id', '=', 'driver.gender_driver')
            ->join('status_driver', 'driver.status_driver', '=', 'status_driver.status_driver_id')
            ->where('driver.driver_id', '=', $id)
            ->first();
        // dd($driver);
        $count_booking = Booking::select(DB::raw('count(booking_id) as tongDon'))
            ->where('booking.booking_status', '=', 1)
            ->get();
        $countTongDon = $count_booking[0]['tongDon'];
        return view('driver.edit', [
            'driver' => $driver,
            'driverGarage' => $driverGarage,
            'driverStatus' => $driverStatus,
            'driverGender' => $driverGender,
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
        $driver = Driver::find($id);
        $driver->fullname_driver = $request->fullnameDriver;
        $driver->gender_driver = $request->driverGender;
        $driver->dob_driver = $request->dobDriver;
        $driver->contact_driver = $request->contactDriver;
        $driver->email_driver = $request->emailDriver;
        $driver->driver_garage = $request->driverGarage;
        $driver->status_driver = $request->driverStatus;
        // $driver->driver_image = $request->imageDriver;
        $driver->save();
        // dd($driver);
        return Redirect::route('driver.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
