<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(request $request)
    {
        $search = $request->get('search');
        $searchAll = Payment::join('booking', 'booking.booking_id', '=', 'payment.booking_id')
            ->join('travel_schedule', 'travel_schedule.schedule_id', '=', 'booking.schedule_id')
            ->join('bus', 'bus.bus_id', '=', 'travel_schedule.bus_id')
            ->join('payment_status', 'payment_status.payment_status_id', '=', 'payment.payment_status')
            ->join('garage', 'garage.garage_id', '=', 'bus.bus_garage')
            ->join('user', 'user.user_id', '=', 'booking.user_id')
            ->join('driver', 'driver.driver_id', '=', 'travel_schedule.driver_id')
            ->where('user.full_name_user', 'like', '%' . $search . '%')
            ->get();
        // dd($search);
        return view('layouts.navbar ', [
            'search' => $search,
            'searchAll' => $searchAll,

        ]);
    }
}
