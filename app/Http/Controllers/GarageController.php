<?php

namespace App\Http\Controllers;

use App\Models\Garage;
use App\Models\Booking;
use App\Models\StatusGarage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class GarageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $searchGarage = $request->get('search');
        $indexGarage = Garage::join('status_garage', 'status_garage.status_garage_id', '=', 'garage.status_garage')
            // ->join('driver', 'driver.driver_garage', '=', 'garage.garage_id')
            // ->join('bus', 'bus.bus_garage', '=', 'garage.garage_id')
            ->where('name_garage', 'like', '%' . $searchGarage . '%')
            ->paginate(3);
        // dd($indexGarage);
        $count_booking = Booking::select(DB::raw('count(booking_id) as tongDon'))
            ->where('booking.booking_status', '=', 1)
            ->get();
        $countTongDon = $count_booking[0]['tongDon'];
        return view('garage.index ', [
            'searchGarage' => $searchGarage,
            'indexGarage' => $indexGarage,
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
        $statusGarage = StatusGarage::All();
        $count_booking = Booking::select(DB::raw('count(booking_id) as tongDon'))
            ->where('booking.booking_status', '=', 1)
            ->get();
        $countTongDon = $count_booking[0]['tongDon'];
        return view('garage.create', compact('statusGarage'), [
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
        $image = $request->file('image');
        $nameImage = $image->getClientOriginalName();
        $LuuAnh = 'assets/image/garage';
        $image->move($LuuAnh, $nameImage);


        $name  = $request->get('name');
        $garage = new Garage;
        $garage->name_garage = $request->nameGarage;
        $garage->email_garage = $request->emailGarage;
        $garage->contact_garage = $request->contactGarage;
        $garage->address_garage = $request->addressGarage;
        $garage->status_garage = $request->statusGarage;
        $garage->garage_image = $LuuAnh . '/' . $nameImage;
        $garage->save();
        return Redirect::route('garage.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $garage = Garage::find($id)
            ->join('status_garage', 'garage.status_garage', '=', 'status_garage.status_garage_id')
            ->join('bus', 'garage.garage_id', '=', 'bus.bus_garage')
            ->join('bus_type', 'bus_type.bus_type_id', '=', 'bus.bus_type')
            ->join('bus_status', 'bus_status.bus_status_id', '=', 'bus.bus_status')
            ->join('driver', 'garage.garage_id', '=', 'driver.driver_garage')
            ->join('status_driver', 'driver.status_driver', '=', 'status_driver.status_driver_id')
            ->first();
        $garageStatus = StatusGarage::All();
        $count_booking = Booking::select(DB::raw('count(booking_id) as tongDon'))
            ->where('booking.booking_status', '=', 1)
            ->get();
        $countTongDon = $count_booking[0]['tongDon'];
        // dd($garage);
        return view('garage.show', [
            'garage' => $garage,
            'garageStatus' => $garageStatus,
            'count_booking' => $countTongDon
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
