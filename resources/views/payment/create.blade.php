@extends('layouts.app')
@section('content')
<div class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">person_add</i>
                                </div>
                                <div class="card-content">
                                <h4 class="card-title">Add Payment</h4>
                                
                                    <div class="col-md-12">
                                        
                                            <form id="TypeValidation" class="form-horizontal" action="{{ route('payment.store')}}" method="post">
                                                @csrf
                                                <div class="card-content">
                                                <div class="row">
                                                            <label class="col-sm-2 label-on-left">Booking </label>
                                                            <div class="col-sm-7">
                                                                <div class="form-group label-floating">
                                                                    <label class="control-label"></label>
                                                                    <select class="form-control" name="booking">
                                                                        <option>Select</option>
                                                                        @foreach ($booking as $b)
                                                                          <option value="{{ $b->booking_id }}"> {{ $b->fullname_user. '(' .$b->starting_point. '-' . $b->destination .')'. '(' .$b->date_of_booking .')' }} </option>
                                                                        @endforeach    
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <div class="row">
                                                        <label class="col-sm-2 label-on-left">Amount Paid</label>
                                                        <div class="col-sm-7">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label"></label>
                                                                <input class="form-control" type="text" name="amountPaid" required="true" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-sm-2 label-on-left">Payment Status</label>
                                                        <div class="col-sm-7">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label"></label>
                                                                <select class="form-control" name="paymentStatus">
                                                                    <option>Select</option>
                                                                    @foreach ($statusPayment as $sp)
                                                                    <option value="{{ $sp->payment_status_id }}"> {{ $sp->name_payment_status }} </option>
                                                                  @endforeach    
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer text-center">
                                                    <button type="submit" class="btn btn-rose btn-fill">Add Payment</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
</div>
@endsection
