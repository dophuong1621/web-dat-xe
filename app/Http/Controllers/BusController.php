<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Garage;
use App\Models\Booking;
use App\Models\BusType;
use App\Models\StatusBus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $searchBus = $request->get('search');
        $indexBus = Bus::join('garage', 'garage.garage_id', '=', 'bus.bus_garage')
            ->where('bus_plate_number', 'like', '%' . $searchBus . '%')
            ->join('bus_type', 'bus_type.bus_type_id', '=', 'bus.bus_type')
            ->join('bus_status', 'bus_status.bus_status_id', '=', 'bus.bus_status')
            ->paginate(3);
        // dd($indexBus);
        $count_booking = Booking::select(DB::raw('count(booking_id) as tongDon'))
            ->where('booking.booking_status', '=', 1)
            ->get();
        $countTongDon = $count_booking[0]['tongDon'];
        return view('bus.index ', [
            'searchBus' => $searchBus,
            'indexBus' => $indexBus,
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
        $busType = BusType::All();
        $busGarage = Garage::All();
        $busStatus = StatusBus::All();
        $count_booking = Booking::select(DB::raw('count(booking_id) as tongDon'))
            ->where('booking.booking_status', '=', 1)
            ->get();
        $countTongDon = $count_booking[0]['tongDon'];
        return view('bus.create', compact('busType', 'busGarage', 'busStatus'), [
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
        $LuuAnh = 'assets/image/bus';
        $image->move($LuuAnh, $nameImage);

        $bus = new Bus();
        $bus->bus_garage = $request->busGarage;
        $bus->bus_plate_number = $request->busPlateNumber;
        $bus->bus_type = $request->busType;
        $bus->capacity = $request->capacity;
        $bus->bus_status = $request->busStatus;
        $bus->bus_image = $LuuAnh . '/' . $nameImage;
        $bus->save();
        return Redirect::route('bus.index');
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
        $bus_type = BusType::all();
        $status_bus = StatusBus::all();
        $bus_garage = Garage::all();
        $bus =  Bus::join('bus_type', 'bus_type.bus_type_id', '=', 'bus.bus_type')
            ->join('bus_status', 'bus.bus_status', '=', 'bus_status.bus_status_id')
            ->join('garage', 'garage.garage_id', '=', 'bus.bus_garage')
            ->where('bus.bus_id', '=', $id)
            ->first();
        // dd($bus);
        $count_booking = Booking::select(DB::raw('count(booking_id) as tongDon'))
            ->where('booking.booking_status', '=', 1)
            ->get();
        $countTongDon = $count_booking[0]['tongDon'];
        return view('bus.edit', [
            'bus' => $bus,
            'bus_type' => $bus_type,
            'status_bus' => $status_bus,
            'bus_garage' => $bus_garage,
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
        $bus = Bus::find($id);
        $bus->bus_garage = $request->busGarage;
        $bus->bus_plate_number = $request->busPlateNumber;
        $bus->bus_type = $request->busType;
        $bus->capacity = $request->busCapacity;
        // $bus->bus_image = $request->busImage;
        $bus->bus_status = $request->busStatus;
        $bus->save();
        // dd($bus);
        return Redirect::route('bus.index');
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
