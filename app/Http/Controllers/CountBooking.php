<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountBooking extends Controller
{
    public function count()
    {

        $count_booking = Booking::select(DB::raw('count(id) as tongDon'))
            ->where('booking.booking_status', '=', 1)
            ->get();
        // dd($count_booking);
        return view('layouts.sidebar', [
            'count_booking' => $count_booking,
        ]);
    }
}
