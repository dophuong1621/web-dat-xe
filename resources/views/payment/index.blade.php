@extends('layouts.app')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">payment</i>
                </div>
                <div class="card-content">
                <h4 class="card-title">Payment</h4>
                <form action="" method="GET">
                    <div class="col-sm-6 col-lg-3">
                        <input type="date" class="form-control" name="date_form" placeholder="Từ ngày" required="true">
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <input type="date" class="form-control" name="date_to" placeholder="Đến ngày" required="true">
                    </div>
                    <button type="submit" class="btn btn-info">Submit</button>
                </form>
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>                    
                                                                <tr>
                                                                    <th class="text-center">ID</th>
                                                                    <th class="text-center"> User</th>
                                                                    <th class="text-center">Schedule </th>
                                                                    <th class="text-center">Deposit Amount</th>
                                                                    <th class="text-center">Total Amount</th>
                                                                    <th class="text-center"> Payment Date</th>
                                                                    <th class="text-center">Status</th>
                                                                    <th class="text-center">Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>  
                                                                <tr @foreach ($indexPayment as $payment)>
                                                                                <td class="text-center">{{ $payment->payment_id }}</td>
                                                                                <td class="text-center">{{ $payment->full_name_user }}</td>
                                                                                <td class="text-center">{{ $payment->starting_point . ' -> '. $payment->destination}}</td>
                                                                                
                                                                                {{-- <td class="text-center">{{ $payment->name_garage }}</td> --}}
                                                                                {{-- <td class="text-center">{{ $payment->schedule_date }}</td> --}}
                                                                                <td class="text-center">{{ $payment->amount_paid.'/'. $payment->fare }}</td>
                                                                                <td class="text-center">{{ $payment->total_amount }}</td>
                                                                                <td class="text-center">{{ $payment->payment_date }}</td>
                                                                                <td class="text-center">{{ $payment->name_payment_status}}
                                                                                </td>
                                                                                
                                                                                <td>
                                                                    <div class="td-actions text-center">
                                                                                <a  rel="tooltip" class="btn btn-info btn-simple" href="{{ route('payment.show', $payment->payment_id) }}">
                                                                                                    <i class="material-icons">visibility</i>
                                                                                </a>
                                                                                                <button type="button" rel="tooltip" class="btn btn-success btn-simple">
                                                                                                    <i class="material-icons">edit</i>
                                                                                                </button>
                                                                                                <button type="button" rel="tooltip" class="btn btn-danger btn-simple">
                                                                                                    <i class="material-icons">close</i>
                                                                                                </button>
                                                            </div>
                                                                                </td>
                                                                </tr @endforeach> 
                                                            </tbody>
                                                        </table>
                                                        {{-- search --}}
                                                        <div class="text-center">
                                                            {{ $indexPayment->appends([
                                                                'indexPayment' => $indexPayment
                                                            ])->links()}}   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                 
@endsection