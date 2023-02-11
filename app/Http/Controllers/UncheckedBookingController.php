<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\TravelSchedule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UncheckedBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $searchUnchecked = $request->get('search');
        $indexUnchecked = Booking::select('*')
            ->join('travel_schedule', 'travel_schedule.schedule_id', '=', 'booking.schedule_id')
            ->join('user', 'user.user_id', '=', 'booking.user_id')
            ->join('booking_status', 'booking.booking_status', '=', 'booking_status.booking_status_id')
            ->where('fullname_user', 'like', "%$searchUnchecked%")
            ->where('booking.booking_status', '=', 1)
            ->paginate(3);
        $count_booking = Booking::select(DB::raw('count(booking_id) as tongDon'))
            ->where('booking.booking_status', '=', 1)
            ->get();
        $countTongDon = $count_booking[0]['tongDon'];
        return view('booking.unchecked_index', [
            'searchUnchecked' => $searchUnchecked,
            'indexUnchecked' => $indexUnchecked,
            'count_booking' => $countTongDon

        ]);
        // $count = Booking::select(DB::raw('count(booking_id) as tongDon'))
        //     ->where('booking.booking_status', '=', 1)
        //     ->get();
        // // dd($count);
        // return view('layouts.sidebar', [
        //     'count' => $count,
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $duyet = Booking::find($id);
        $duyet->booking_status = $request->get('TrangThai');
        $duyet->save();

        if($request->get('TrangThai') == 2){
            $idTravelSchedule = $duyet->schedule_id;
            $soLuongDat = $duyet->number_of_seats;
    
            $travelSchedule = TravelSchedule::where('schedule_id', '=', $idTravelSchedule)->first();
            $soLuongHienCo = $travelSchedule->capacity;
            $ketQua = $soLuongHienCo - $soLuongDat;
            $travelSchedule->capacity = $ketQua;
            $travelSchedule->save();
        }
        return Redirect::route('unchecked-booking.index');
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
