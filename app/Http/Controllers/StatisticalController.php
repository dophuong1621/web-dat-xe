<?php

namespace App\Http\Controllers;

use \Carbon\Carbon;
use App\Models\User;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\TravelSchedule;
use Illuminate\Support\Facades\DB;

class StatisticalController extends Controller
{
    public function user(Request $request)
    {
        $searchPaymentUs = $request->get('search');

        $indexUs = Payment::select('user.id', 'user.fullname_user', 'user.email_user', 'user.contact_user', 'payment.payment_date', DB::raw('count(id) as tongHoaDon'))
            ->join('booking', 'payment.id', '=', 'booking.id')
            ->join('booking_status', 'booking_status.id', '=', 'booking.booking_status')
            ->join('payment_status', 'payment.payment_status', '=', 'payment_status.id')
            ->join('travel_schedule', 'booking.id', '=', 'travel_schedule.id')
            ->join('user', 'booking.id', '=', 'user.id')
            ->join('acount_category', 'user.acount_category', '=', 'acount_category.id')
            ->join('status_user', 'user.acount_status', '=', 'status_user.id')
            ->join('bus', 'bus.id', '=', 'travel_schedule.id')
            ->join('bus_status', 'bus_status.id', '=', 'bus.bus_status')
            ->join('bus_type', 'bus_type.id', '=', 'bus.bus_type')
            ->join('garage', 'garage.id', '=', 'bus.bus_garage')
            ->join('status_garage', 'garage.status_garage', '=', 'status_garage.id')
            ->join('driver', 'driver.id', '=', 'travel_schedule.id')
            ->join('status_driver', 'status_driver.id', '=', 'driver.status_driver')
            ->where('fullname_user', 'like', '%' . $searchPaymentUs . '%')
            ->where('payment.payment_status', '=', '3')
            ->groupBy('user.id', 'user.fullname_user', 'user.email_user', 'user.contact_user')
            ->paginate(3);

        // dd($indexUs);
        return view('statisticals.user', [
            'indexUs' => $indexUs,
            'searchPaymentUs' => $searchPaymentUs,
        ]);
        // return $user;
    }
    public function driver(Request $request)
    {
        $searchPaymentDr = $request->get('search');
        $indexDr = Payment::select('driver.id', 'driver.fullname_driver', 'driver.email_driver', 'driver.contact_driver', DB::raw('count(id) as tongHoaDon'))
            ->join('booking', 'payment.id', '=', 'booking.id')
            ->join('booking_status', 'booking_status.id', '=', 'booking.booking_status')
            ->join('payment_status', 'payment.payment_status', '=', 'payment_status.id')
            ->join('travel_schedule', 'booking.id', '=', 'travel_schedule.id')
            ->join('user', 'booking.id', '=', 'user.id')
            ->join('acount_category', 'user.acount_category', '=', 'acount_category.id')
            ->join('status_user', 'user.acount_status', '=', 'status_user.id')
            ->join('bus', 'bus.id', '=', 'travel_schedule.id')
            ->join('bus_status', 'bus_status.id', '=', 'bus.bus_status')
            ->join('bus_type', 'bus_type.id', '=', 'bus.bus_type')
            ->join('garage', 'garage.id', '=', 'bus.bus_garage')
            ->join('status_garage', 'garage.status_garage', '=', 'status_garage.id')
            ->join('driver', 'driver.id', '=', 'travel_schedule.id')
            ->join('status_driver', 'status_driver.id', '=', 'driver.status_driver')
            ->where('fullname_driver', 'like', '%' . $searchPaymentDr . '%')
            ->where('payment.payment_status', '=', '3')
            ->groupBy('driver.id', 'driver.fullname_driver', 'driver.email_driver', 'driver.contact_driver')
            ->paginate(3);

        // dd($indexDr);
        return view('statisticals.driver', [
            'indexDr' => $indexDr,
            'searchPaymentDr' => $searchPaymentDr,
        ]);
    }
    public function garage(Request $request)
    {
        $searchPaymentGr = $request->get('search');
        $indexGr = Payment::select('garage.id', 'garage.name_garage', 'garage.email_garage', 'garage.contact_garage', DB::raw('count(id) as tongHoaDon'))
            ->join('booking', 'payment.id', '=', 'booking.id')
            ->join('booking_status', 'booking_status.id', '=', 'booking.booking_status')
            ->join('payment_status', 'payment.payment_status', '=', 'payment_status.id')
            ->join('travel_schedule', 'booking.id', '=', 'travel_schedule.id')
            ->join('user', 'booking.id', '=', 'user.id')
            ->join('acount_category', 'user.acount_category', '=', 'acount_category.id')
            ->join('status_user', 'user.acount_status', '=', 'status_user.id')
            ->join('bus', 'bus.id', '=', 'travel_schedule.id')
            ->join('bus_status', 'bus_status.id', '=', 'bus.bus_status')
            ->join('bus_type', 'bus_type.id', '=', 'bus.bus_type')
            ->join('garage', 'garage.id', '=', 'bus.bus_garage')
            ->join('status_garage', 'garage.status_garage', '=', 'status_garage.id')
            ->join('driver', 'driver.id', '=', 'travel_schedule.id')
            ->join('status_driver', 'status_driver.id', '=', 'driver.status_driver')
            ->where('fullname_driver', 'like', '%' . $searchPaymentGr . '%')
            ->where('payment.payment_status', '=', '3')
            ->groupBy('garage.id', 'garage.name_garage', 'garage.email_garage', 'garage.contact_garage')
            ->paginate(3);

        // dd($indexDr);
        return view('statisticals.garage', [
            'indexGr' => $indexGr,
            'searchPaymentGr' => $searchPaymentGr,
        ]);
    }
    public function revenue(Request $request)
    {
        $count_payment = Payment::count();
        $count_revenue = Payment::select(DB::raw('sum(amount_paid) as tongTien'))
            ->where('payment.payment_status', '=', '3')
            ->get();
        // dd($count_revenue);
        $schedule = TravelSchedule::count();
        $user = User::count();
        $searchPaymentUs = $request->get('search');
        // $indexUs = Payment::where('payment_status', '=', '3')
        //     // ->select(DB::raw('count(payment.id) as tongHoaDon'), DB::raw('sum(amount_paid) as revenue'), 'payment.payment_date')
        //     // ->where('user.fullname_user', 'like', '%' . $searchPaymentUs . '%')
        //     ->with('bookingPayment.userBooking', 'bookingPayment')
        //     // ->groupBy('payment.payment_date')
        //     ->paginate(5);
        $indexUs = Payment::select('user.id', 'user.fullname_user', 'user.email_user', 'user.contact_user',  DB::raw('count(payment.id) as tongHoaDon'), DB::raw('sum(amount_paid) as revenue'), 'payment.payment_date')
            ->join('booking', 'payment.booking_id', '=', 'booking.id')
            ->join('user', 'booking.user_id', '=', 'user.id')
            ->where('user.fullname_user', 'like', '%' . $searchPaymentUs . '%')
            ->where('payment.payment_status', '=', '3')
            ->groupBy('user.id', 'user.fullname_user', 'user.email_user', 'user.contact_user', 'payment.payment_date')
            ->paginate(10);
        // dd($indexUs);
        if (request()->date_form && request()->date_to) {
            $indexUs = Payment::select('user.id', 'user.fullname_user', 'user.email_user', 'user.contact_user', DB::raw('count(payment.id) as tongHoaDon'), 'payment.payment_date')
                ->join('booking', 'payment.booking_id', '=', 'booking.id')
                ->join('user', 'booking.user_id', '=', 'user.id')
                ->where('fullname_user', 'like', '%' . $searchPaymentUs . '%')
                ->where('payment.payment_status', '=', '3')
                ->groupBy('user.id', 'user.fullname_user', 'user.email_user', 'user.contact_user', 'payment.payment_date')
                ->whereBetween('payment_date', [request()->date_form, request()->date_to])
                ->paginate(5);
        }

        $count_booking = Booking::select(DB::raw('count(id) as tongDon'))
            ->where('booking.booking_status', '=', 1)
            ->get();
        $countTongDon = $count_booking[0]['tongDon'];

        return view('statisticals.revenue', [
            'count_payment' => $count_payment,
            'count_revenue' => $count_revenue,
            'schedule' => $schedule,
            'user' => $user,
            'indexUs' => $indexUs,
            'searchPaymentUs' => $searchPaymentUs,
            'count_booking' => $countTongDon
        ]);
    }
}
