<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\StatusPayment;
use App\Models\Payment;
use App\Models\TravelSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


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
            ->where('fullname_user', 'like', '%' . $searchPayment . '%')
            ->paginate(3);
        // dd($indexPayment);
        if (request()->date_form && request()->date_to) {
            $indexPayment = Payment::join('booking', 'booking.booking_id', '=', 'payment.booking_id')
                ->join('travel_schedule', 'travel_schedule.schedule_id', '=', 'booking.schedule_id')
                ->join('bus', 'bus.bus_id', '=', 'travel_schedule.bus_id')
                ->join('payment_status', 'payment_status.payment_status_id', '=', 'payment.payment_status')
                ->join('garage', 'garage.garage_id', '=', 'bus.bus_garage')
                ->join('user', 'user.user_id', '=', 'booking.user_id')
                ->where('fullname_user', 'like', '%' . $searchPayment . '%')
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
        $statusPayment = StatusPayment::All();
        $booking = TravelSchedule::join('booking', 'booking.schedule_id','=','travel_schedule.schedule_id')
        ->join('user', 'user.user_id','=','booking.user_id')
        ->get();
        $statusPayment = StatusPayment::All();
        $count_booking = Booking::select(DB::raw('count(booking_id) as tongDon'))
            ->where('booking.booking_status', '=', 1)
            ->get();
        $countTongDon = $count_booking[0]['tongDon'];
        return view('payment.create', compact('statusPayment'), [
            'count_booking' => $countTongDon,
            'booking' => $booking,
            'statusPayment' => $statusPayment
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
        $payment = new Payment();
        $payment->booking_id = $request->booking;
        $payment->amount_paid = $request->amountPaid;
        $payment->payment_date = date('Y/m/d');
        $payment->payment_status = $request->paymentStatus;
        $payment->save();
        return Redirect::route('payment.index');
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
            ->where('payment.payment_id', '=', $id)
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
