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
        $searchAll = Payment::join('booking', 'booking.id', '=', 'payment.id')
            ->join('travel_schedule', 'travel_schedule.id', '=', 'booking.id')
            ->join('bus', 'bus.id', '=', 'travel_schedule.id')
            ->join('payment_status', 'payment_status.id', '=', 'payment.payment_status')
            ->join('garage', 'garage.id', '=', 'bus.bus_garage')
            ->join('user', 'user.id', '=', 'booking.id')
            ->join('driver', 'driver.id', '=', 'travel_schedule.id')
            ->where('user.fullname_user', 'like', '%' . $search . '%')
            ->where('driver.fullname_driver', 'like', '%' . $search . '%')
            ->where('bus.bus_plate_number', 'like', '%' . $search . '%')
            ->where('garage.name_garage', 'like', '%' . $search . '%')
            ->get();
        // dd($search);
        return view('layouts.navbar ', [
            'search' => $search,
            'searchAll' => $searchAll,

        ]);
    }
}
