@extends('layouts.app')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">close</i>
                </div>
                <div class="card-content">
                    
                <h4 class="card-title">Unchecked Booking </h4>
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>                    
                                                                <tr>
                                                                    <th class="text-center">ID</th>
                                                                    <th class="text-center">Number of seats</th>
                                                                    <th class="text-center">Fare Amount</th>
                                                                    <th class="text-center">Total Amount</th>
                                                                    <th class="text-center">Date of Booking</th>
                                                                    {{-- <th class="text-center">Booking Image</th> --}}
                                                                    <th class="text-center">Status</th>
                                                                    <th class="text-center">User</th>
                                                                    <th class="text-center">Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr @foreach ($indexUnchecked as $unchecked)>                
                                                               
                                                                                <td class="text-center">{{ $unchecked->booking_id}}</td>
                                                                                <td class="text-center">{{ $unchecked->number_of_seats }}</td>
                                                                                <td class="text-center">{{ $unchecked->fare }}</td>
                                                                                <td class="text-center">{{ $unchecked->total_amount }}</td>
                                                                                <td class="text-center">{{ $unchecked->date_of_booking }}</td>
                                                                                {{-- <td class="text-center">{{ $unchecked->booking_image }}</td> --}}
                                                                                <td class="text-center">{{ $unchecked->name_booking_status }}</td>
                                                                                <td class="text-center">{{ $unchecked->full_name_user }}</td>
                                                                                <td>
                                                                    <div class="td-actions text-center">
                                                                                <a  rel="tooltip" class="btn btn-info btn-simple" href="">
                                                                                                    <i class="material-icons">visibility</i>
                                                                                </a>
                                                                                <form method="POST" action="{{ route('unchecked-booking.update', $unchecked->booking_id) }}"  class="btn btn-simple btn-danger btn-icon table-action Duyệt">
                                                                                    @method('PUT')
                                                                                    @csrf
                                                                                        <input type="hidden" name="TrangThai" value="2">
                                                                                        <button class="btn btn-simple btn-success btn-icon table-action Duyệt" >
                                                                                            <i class="material-icons" <?= $unchecked->booking_status == 2 ? "checked" : "" ?>>check</i>
                                                                                        </button>
                                                                                    </form>
                                                                                <form action="{{ route('check-booking.destroy', $unchecked->booking_id) }}" method="Delete" class="btn btn-simple btn-danger btn-icon table-action Huỷ">
                                    
                                                                                        <input type="hidden" name="" rel="tooltip" data-original-title="Remove">
                                                                                        <button class="btn btn-simple btn-danger btn-icon table-action Huỷ">
                                                                                        <i class="material-icons">close</i> 
                                                                                        {{-- <form action="{{ route('unchecked-booking.update', $unchecked->booking_id) }}"  class="btn btn-simple btn-danger btn-icon table-action Huỷ">
                                                                                    @method('PUT')
                                                                                    @csrf
                                                                                        <input type="hidden" name="TrangThai" value="3">
                                                                                        <button class="btn btn-simple btn-danger btn-icon table-action Huỷ">
                                                                                        <i i class="material-icons" <?= $unchecked->booking_status == 3 ? "checked" : "" ?>>close</i>  
                                                                            </form>  --}}
                                                                            </form>
                                                            </div>
                                                                </tr @endforeach>
                                                                
                                                            </tbody>
                                                        </table>
                                                        {{-- search --}}
                                                        <div class="text-center">
                                                            {{ $indexUnchecked->appends([
                                                                'indexUnchecked' => $indexUnchecked
                                                            ])->links()}}   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>               
@endsection