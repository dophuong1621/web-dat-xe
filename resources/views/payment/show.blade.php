@extends('layouts.app')
@section('content')
<div class="content">
                    <div class="col-md-12">
                                        <div class="card">
                                            <form id="TypeValidation" class="form-horizontal" action="{{ route('payment.show', $showPayment->payment_id)}}" method="POST">
                                                            @method("PUT")
                                                            @csrf
                                                <div class="card-header card-header-text" data-background-color="rose">
                                                    <h4 class="card-title">Show Payment</h4>
                                                </div>
                                                
                                                <div class="card-content">
                                                    <div class="row">
                                                        <label class="col-sm-2 label-on-left">ID</label>
                                                        <div class="col-sm-7">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label"></label>
                                                                {{-- <input class="form-control" type="text" name="required" required="true" /> --}}
                                                                <input input readonly name="paymentID" class="form-control" value="{{ $showPayment->payment_id }}">
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-sm-2 label-on-left">Email</label>
                                                        <div class="col-sm-7">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label"></label>
                                                                <input class="form-control" type="text" name="email" email="true" />
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-sm-2 label-on-left">Number</label>
                                                        <div class="col-sm-7">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label"></label>
                                                                <input class="form-control" type="text" name="number" number="true" />
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-sm-2 label-on-left">Url</label>
                                                        <div class="col-sm-7">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label"></label>
                                                                <input class="form-control" type="text" name="url" url="true" />
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-sm-2 label-on-left">Equal to</label>
                                                        <div class="col-sm-3">
                                                            <div class="form-group label-floating column-sizing">
                                                                <label class="control-label"></label>
                                                                <input class="form-control" id="idSource" type="text" placeholder="#idSource" />
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-group label-floating column-sizing">
                                                                <label class="control-label"></label>
                                                                <input class="form-control" id="idDestination" type="text" placeholder="#idDestination" equalTo="#idSource" />
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="card-footer text-center">
                                                    <button type="submit" class="btn btn-rose btn-fill">Validate Inputs</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
</div>
@endsection