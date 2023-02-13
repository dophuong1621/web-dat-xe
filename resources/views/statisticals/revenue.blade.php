@extends('layouts.app')
@section('content')
<div class="content">
<div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="orange">
                                <i class="material-icons">payment</i>
                            </div>
                            <div class="card-content">
                                <p class="category">Payment</p>
                                <h3 class="card-title">{{$count_payment}}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <a href="{{ route('payment.index') }}">More Info
                                        <div class="material-icons" style="top: 0px">arrow_circle_right</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="green">
                                <i class="material-icons">store</i>
                            </div>
                            <div class="card-content">
                                <p class="category">Revenue</p>
                                <h3 class="card-title">
                                    @foreach($count_revenue as $cr)
                                    <?php if(isset($cr->tongTien)){
                                       echo number_format($cr->tongTien,0,",",".");
                                    }else{echo '0';}?>
                                    </h3>
                                    @endforeach
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">date_range</i> Last Month
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="rose">
                                <i class="material-icons">list</i>
                            </div>
                            <div class="card-content">
                                <p class="category">Schedule</p>
                                <h3 class="card-title">{{ $schedule }}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <a href="{{ route('travel-schedule.index') }}">More Info
                                        <div class="material-icons" style="top: 0px">arrow_circle_right</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="rose">
                                <i class="material-icons">person</i>
                            </div>
                            <div class="card-content">
                                <p class="category">User</p>
                                <h3 class="card-title">{{$user}}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <a href="{{ route('user.index') }}">More Info
                                        <div class="material-icons" style="top: 0px">arrow_circle_right</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-icon" data-background-color="rose">
                                <i class="material-icons">assessment</i>
                            </div>
                            <div class="card-content">
                            <h4 class="card-title">Revenue</h4>
                        <div class="row">
                        <form action="" method="GET">
                            <div class="col-sm-6 col-lg-3">
                                <input type="date" class="form-control" name="date_form" placeholder="Từ ngày" required="true">
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <input type="date" class="form-control" name="date_to" placeholder="Đến ngày" required="true">
                            </div>
                            <button type="submit" class="btn btn-info">Submit</button>
                        </form>
                        </div>
                                                                <div class="table-responsive">
                                                                    <table class="table">
                                                                        <thead>                    
                                                                            <tr>
                                                                                <th class="text-center">ID</th>
                                                                                <th class="text-center">Name</th>
                                                                                <th class="text-center">Email</th>
                                                                                <th class="text-center">Contact</th>
                                                                                <th class="text-center">Invoice Quantity</th>
                                                                                <th class="text-center">Revenue</th>
                                                                                <th class="text-center">Date</th>
                                                                                <th class="text-center">Actions</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>             
                                                                            <tr @foreach($indexUs as $payment)>
                                                                                <td class="text-center">{{ $payment->id }}</td>
                                                                                <td class="text-center">{{ $payment->fullname_user }}</td>
                                                                                <td class="text-center">{{ $payment->email_user }}</td>
                                                                                <td class="text-center">{{ $payment->contact_user }}</td>
                                                                                <td class="text-center">{{ $payment->tongHoaDon }}</td>
                                                                                <td class="text-center">{{ number_format($payment->revenue,0,",",".") }}</td>
                                                                                <td class="text-center">{{ $payment->payment_date }}</td>
                                                                                <td class="text-center"  >
                                                                                    <div class="td-actions text-center">
                                                                                    <a href="#" class="btn btn-info btn-simple"><i class="material-icons">visibility</i></a>
                                                                                    </div>
                                                                                </td>
                                                                            </tr @endforeach>
                                                                        </tbody>
                                                                    </table>
                                                                    <div class="text-center">
                                                                        {{ $indexUs->appends([
                                                                            'indexUs' => $indexUs
                                                                        ])->links()}}   
                                                                </div>
                                                            </div>
                                                        </div>
                </div>
    </div>
</div>
@endsection 