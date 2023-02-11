<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Driver;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\TravelSchedule;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class TravelScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $searchSchedule = $request->get('search');
        $indexSchedule = TravelSchedule::join('bus', 'bus.bus_id', '=', 'travel_schedule.bus_id')
            ->join('driver', 'driver.driver_id', '=', 'travel_schedule.driver_id')
            ->where('starting_point', 'like', '%' . $searchSchedule . '%')
            ->orwhere('destination', 'like', '%' . $searchSchedule . '%')
            ->orwhere('schedule_date', 'like', '%' . $searchSchedule . '%')
            ->orwhere('departune_time', 'like', '%' . $searchSchedule . '%')
            ->orwhere('estivated_arrived_time', 'like', '%' . $searchSchedule . '%')
            ->paginate(3);
        // dd($indexSchedule);
        $count_booking = Booking::select(DB::raw('count(booking_id) as tongDon'))
            ->where('booking.booking_status', '=', 1)
            ->get();
        $countTongDon = $count_booking[0]['tongDon'];
        return view('schedule.index ', [
            'searchSchedule' => $searchSchedule,
            'indexSchedule' => $indexSchedule,
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
        $bus = Bus::All();
        $driver = Driver::join('garage', 'garage.garage_id', '=', 'driver.driver_garage')
            ->get();
        // dd($driver);
        $count_booking = Booking::select(DB::raw('count(booking_id) as tongDon'))
            ->where('booking.booking_status', '=', 1)
            ->get();
        $countTongDon = $count_booking[0]['tongDon'];
        return view('schedule.create', compact('bus', 'driver'), [
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
        $schedule = new TravelSchedule;
        $schedule->bus_id = $request->bus;
        $schedule->driver_id = $request->garage;
        $schedule->starting_point = $request->startingPoint;
        $schedule->destination = $request->destination;
        $schedule->schedule_date = $request->scheduleDate;
        $schedule->departune_time = $request->departuneTime;
        $schedule->estivated_arrived_time = $request->estivatedArrivedTime;
        $schedule->fare_amount = $request->fareAmount;
        $schedule->capacity = $request->capacity;
        $schedule->remarks = $request->remarks;
        $schedule->save();
        return Redirect::route('travel-schedule.index');
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
        $bus = Bus::all();
        $driver = Driver::join('garage', 'garage.garage_id', '=', 'driver.driver_garage')
            ->get();
        $schedule =  TravelSchedule::select('travel_schedule.*', 'bus.bus_plate_number','garage.name_garage','driver.fullname_driver')
            ->join('bus', 'bus.bus_id', '=', 'travel_schedule.bus_id')
            ->join('garage', 'bus.bus_garage', '=', 'garage.garage_id')
            ->join('driver', 'driver.driver_id', '=', 'travel_schedule.driver_id')
            ->where('travel_schedule.schedule_id', '=', $id)
            ->first();
        // dd($driver);
        $count_booking = Booking::select(DB::raw('count(booking_id) as tongDon'))
            ->where('booking.booking_status', '=', 1)
            ->get();
        $countTongDon = $count_booking[0]['tongDon'];
        return view('schedule.edit', [
            'driver' => $driver,
            'bus' => $bus,
            'schedule' => $schedule,
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
        $schedule = TravelSchedule::find($id);
        $schedule->bus_id = $request->bus;
        $schedule->driver_id = $request->driver;
        $schedule->starting_point = $request->startingPoint;
        $schedule->destination = $request->destination;
        $schedule->schedule_date = $request->scheduleDate;
        $schedule->departune_time = $request->derpartuneTime;
        $schedule->estivated_arrived_time = $request->estivatedArrivedTime;
        $schedule->fare_amount = $request->fareAmount;
        $schedule->capacity = $request->capacity;
        $schedule->remarks = $request->remarks;
        $schedule->save();
        return Redirect::route('travel-schedule.index');
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
