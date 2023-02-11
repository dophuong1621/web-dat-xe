@extends('layouts.app')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">done_all</i>
                </div>
                <div class="card-content">
                <h4 class="card-title">Check Booking </h4>
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>                    
                                                                <tr>
                                                                    <th class="text-center">ID</th>
                                                                    <th class="text-center">User</th>
                                                                    <th class="text-center">Number of seats</th>
                                                                    <th class="text-center">Fare Amount</th>
                                                                    <th class="text-center">Total Amount</th>
                                                                    <th class="text-center">Date of Booking</th>
                                                                    <!-- <th class="text-center">Status</th> -->
                                                                    <!-- <th class="text-center">Actions</th> -->
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr @foreach ($indexCheck as $check)> 
                                                                                <td class="text-center">{{ $check->booking_id}}</td>
                                                                                <td class="text-center">{{ $check->fullname_user }}</td>
                                                                                <td class="text-center">{{ $check->number_of_seats }}</td>
                                                                                <td class="text-center">{{ number_format($check->fare_amount,0,",",".") }}</td>
                                                                                <td class="text-center">{{ number_format($check->total_amount,0,",",".") }}</td>
                                                                                <td class="text-center">{{ $check->date_of_booking }}</td>
                                                                                <!-- <td class="text-center">{{ $check->name_booking_status }}</td> -->
                                                                                
                                                                                <td>
                                                                    <div class="td-actions text-center">
                                                                                <!-- <a  rel="tooltip" class="btn btn-info btn-simple" href="">
                                                                                                    <i class="material-icons">visibility</i>
                                                                                </a> -->
                                                                                                {{-- <button type="button" rel="tooltip" class="btn btn-success btn-simple">
                                                                                                    <i class="material-icons">check</i>
                                                                                                </button>
                                                                                                <button type="button" rel="tooltip" class="btn btn-danger btn-simple">
                                                                                                    <i class="material-icons">close</i>
                                                                                                </button> --}}
                                                            </div>
                                                                </tr @endforeach> 
                                                            </tbody>
                                                        </table>
                                                        {{-- search --}}
                                                        <div class="text-center">
                                                            {{ $indexCheck->appends([
                                                                'indexCheck' => $indexCheck
                                                            ])->links()}}   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>               
@endsection