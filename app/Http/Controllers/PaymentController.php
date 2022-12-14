<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $searchPayment = $request->get('search');
        $indexPayment = Payment::join('booking', 'booking.booking_id', '=', 'payment.booking_id')
            ->join('travel_schedule', 'travel_schedule.schedule_id', '=', 'booking.schedule_id')
            ->join('bus', 'bus.bus_id', '=', 'travel_schedule.bus_id')
            ->join('payment_status', 'payment_status.payment_status_id', '=', 'payment.payment_status')
            ->join('garage', 'garage.garage_id', '=', 'bus.bus_garage')
            ->join('user', 'user.user_id', '=', 'booking.user_id')
            ->where('full_name_user', 'like', '%' . $searchPayment . '%')
            ->paginate(3);
        // dd($indexPayment);
        if (request()->date_form && request()->date_to) {
            $indexPayment = Payment::join('booking', 'booking.booking_id', '=', 'payment.booking_id')
                ->join('travel_schedule', 'travel_schedule.schedule_id', '=', 'booking.schedule_id')
                ->join('bus', 'bus.bus_id', '=', 'travel_schedule.bus_id')
                ->join('payment_status', 'payment_status.payment_status_id', '=', 'payment.payment_status')
                ->join('garage', 'garage.garage_id', '=', 'bus.bus_garage')
                ->join('user', 'user.user_id', '=', 'booking.user_id')
                ->where('full_name_user', 'like', '%' . $searchPayment . '%')
                ->whereBetween('payment_date', [request()->date_form, request()->date_to])
                ->paginate(3);
        }
        $count_booking = Booking::select(DB::raw('count(booking_id) as tongDon'))
            ->where('booking.booking_status', '=', 1)
            ->get();
        $countTongDon = $count_booking[0]['tongDon'];
        return view('payment.index ', [
            'searchPayment' => $searchPayment,
            'indexPayment' => $indexPayment,
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
        //
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
        $showPayment = Payment::find($id)
            ->join('booking', 'booking.booking_id', '=', 'payment.booking_id')
            ->join('travel_schedule', 'travel_schedule.schedule_id', '=', 'booking.schedule_id')
            ->join('bus', 'bus.bus_id', '=', 'travel_schedule.bus_id')
            ->join('payment_status', 'payment_status.payment_status_id', '=', 'payment.payment_status')
            ->join('garage', 'garage.garage_id', '=', 'bus.bus_garage')
            ->join('user', 'user.user_id', '=', 'booking.user_id')
            ->get();
        // dd($showPayment);
        return view('payment.show ', [
            'showPayment' => $showPayment,

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
