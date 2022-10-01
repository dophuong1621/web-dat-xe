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
                                        <h4 class="card-title">Edit Driver </h4>
                                                        <form method="POST" action="{{ route('driver.update', $driver->driver_id) }}">
                                                            @method("PUT")
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group label-floating ">
                                                                        <label class="control-label">Fullname</label>
                                                                        <input type="text" class="form-control" name="fullnameDriver" value="{{ $driver->fullname_driver }}" ></div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group label-floating ">
                                                                        <label class="control-label">Gender</label>
                                                                        <select class="form-control" name="driverGender">
                                                                            <option value="{{ $driver->gender_id }}" selected>{{ $driver->gender_name}}</option>
                                                                            @foreach ($driverGender as $drg)
                                                                              <option value="{{ $drg->gender_id }}"> {{ $drg->gender_name}} </option>
                                                                            @endforeach    
                                                                        </select>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group label-floating ">
                                                                        <label class="control-label">Date of Birth</label>
                                                                        <input type="date" class="form-control" name="dobDriver" value="{{ $driver->dob_driver }}" >
                                                                    <span class="material-input"></span></div>
                                                                </div>
                                                            
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group label-floating">
                                                                        <label class="control-label">Contact</label>
                                                                        <input type="float" class="form-control" name="contactDriver" value="{{ $driver->contact_driver}}" >
                                                                    <span class="material-input"></span></div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group label-floating">
                                                                        <label class="control-label">Email Address</label>
                                                                        <input type="text" class="form-control" name="emailDriver" value="{{ $driver->email_driver}}" >
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-4">           
                                                                    <div class="form-group label-floating">
                                                                                        <label class="control-label">Driver Garage</label>
                                                                                        
                                                                                        <select class="form-control" name="driverGarage">
                                                                                            <option value="{{ $driver->garage_id }}" selected>{{ $driver->name_garage}}</option>
                                                                                            @foreach ($driverGarage as $dg)
                                                                                              <option value="{{ $dg->garage_id }}"> {{ $dg->name_garage }} </option>
                                                                                            @endforeach    
                                                                                        </select>
                                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">           
                                                                    <div class="form-group label-floating">
                                                                                        <label class="control-label">Driver Status</label>
                                                                                        <select class="form-control" name="driverStatus">
                                                                                            <option value="{{ $driver->status_driver_id}}" selected>{{  $driver->name_status_driver}}</option>
                                                                                            @foreach ($driverStatus as $ds)
                                                                                            <option value="{{ $ds->status_driver_id }}"> {{ $ds->name_status_driver }} </option>
                                                                                          @endforeach    
                                                                                        </select>
                                                                                    </div>
                                                                </div>
                                                                {{-- <div class="col-md-4">
                                                                    <div class="form-group label-floating">
                                                                        <label class="control-label">Image</label>
                                                                        <img src="{{ $driver->driver_image }}" style="width:50px; height: 50px" value="{{ $driver->driver_id }}" selected>
                                                                    </div>
                                                                </div> --}}
                                                            </div>
                                                            
                                        </div>
                                                            
                                                            <button type="submit" class="btn btn-rose pull-right">Edit Profile</button>
                                                            <div class="clearfix"></div>
                                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
</div>
@endsection