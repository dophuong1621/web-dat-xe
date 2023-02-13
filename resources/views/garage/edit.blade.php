@extends('layouts.app')
@section('content')
<div class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">commute</i>
                                </div>
                                <div class="card-content">
                                        <h4 class="card-title">Edit Garage </h4>
                                                        <form method="POST" action="{{ route('garage.update', $garage->id) }}">
                                                            @method("PUT")
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group label-floating ">
                                                                        <label class="control-label">Name</label>
                                                                        <input type="text" class="form-control" name="nameGarage" value="{{ $garage->name_garage }}" ></div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group label-floating ">
                                                                        <label class="control-label">Email</label>
                                                                        <input type="text" class="form-control" name="emailGarage" value="{{ $garage->email_garage }}" ></div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group label-floating ">
                                                                        <label class="control-label">Contact</label>
                                                                        <input type="number" class="form-control" name="contactGarage" value="{{ $garage->contact_garage }}" >
                                                                    <span class="material-input"></span></div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group label-floating">
                                                                        <label class="control-label">Address</label>
                                                                        <input type="text" class="form-control" name="addressGarage" value="{{ $garage->address_garage}}" >
                                                                    <span class="material-input"></span></div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group label-floating">
                                                                                        <label class="control-label">Garage Status</label>
                                                                                        <select class="form-control" name="garageStatus">
                                                                                            <option value="{{ $garage->garageStatus[0]->id}}" selected>{{  $garage->garageStatus[0]->name_status_garage}}</option>
                                                                                            @foreach ($garageStatus as $ds)
                                                                                            <option value="{{ $ds->id }}"> {{ $ds->name_status_garage }} </option>
                                                                                          @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button type="submit" class="btn btn-rose pull-right">Edit</button>
                                                            <div class="clearfix"></div>
                                        </div>
                                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
</div>
@endsection
