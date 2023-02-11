@extends('layouts.app')
@section('content')
<div class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">preview</i>
                                </div>  
                                <div class="card-content">
                                        <h4 class="card-title">Show Garage </h4>
                                                            <h3 class="card-title" text-center>Garage </h3>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group label-floating ">
                                                                        <label class="control-label">Name</label>
                                                                        <input type="text" class="form-control" name="garageName" value="{{ $garage->name_garage }}" disabled></div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group label-floating ">
                                                                        <label class="control-label">Email </label>
                                                                        <input type="text" class="form-control" name="garageEmail" value="{{ $garage->email_garage }}"  disabled>
                                                                    <span class="material-input"></span></div>
                                                                </div>
                                                            
                                                            <div class="col-md-4">
                                                                <div class="form-group label-floating">
                                                                    <label class="control-label">Contact</label>
                                                                    <input type="float" class="form-control" name="contactGarage" value="{{ $garage->contact_garage}}" disabled >
                                                                <span class="material-input"></span></div>
                                                            </div>
                                                            
                                                            <div class="col-md-4">
                                                                    <div class="form-group label-floating">
                                                                        <label class="control-label">Address</label>
                                                                        <input type="text" class="form-control" name="garageAddress" value="{{ $garage->address_garage}}" disabled >
                                                                    </div>
                                                                </div>
                                                            
                                                            <div class="col-md-4">           
                                                                                <div class="form-group label-floating">
                                                                                                    <label class="control-label"> Status</label>
                                                                                                    <input type="text" class="form-control" name="garageStatus" value="{{ $garage->name_status_garage }}" disabled >
                                                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                                <div class="form-group label-floating">
                                                                                    <label class="control-label">Image</label>
                                                                                    <img src="/{{ $garage->garage_image }}"  name="garage_image" class="form-control" disabled>
                                                                                </div>
                                                            </div> 
                                                            </div> 

                                                            <h3 class="card-title" text-center>Driver </h3>
                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <div class="form-group label-floating ">
                                                                                        <label class="control-label">Fullname</label>
                                                                                        <input type="text" class="form-control" name="fullnameDriver" value="{{ $garage->fullname_driver }}" disabled></div>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <div class="form-group label-floating ">
                                                                                        <label class="control-label">Date of Birth</label>
                                                                                        <input type="date" class="form-control" name="dobDriver" value="{{ $garage->dob_driver }}" disabled>
                                                                                    <span class="material-input"></span></div>
                                                                                </div>
                                                                            
                                                                            <div class="col-md-4">
                                                                                <div class="form-group label-floating">
                                                                                    <label class="control-label">Contact</label>
                                                                                    <input type="float" class="form-control" name="contactDriver" value="{{ $garage->contact_driver}}" disabled>
                                                                                <span class="material-input"></span></div>
                                                                            </div>
                                                                        
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <div class="form-group label-floating">
                                                                                        <label class="control-label">Email Address</label>
                                                                                        <input type="text" class="form-control" name="emailDriver" value="{{ $garage->email_driver}}" disabled>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                                <div class="col-md-4">           
                                                                                    <div class="form-group label-floating">
                                                                                                        <label class="control-label">Driver Garage</label>
                                                                                                        
                                                                                                        <select class="form-control" name="driverGarage" disabled>
                                                                                                            <option>{{ $garage->name_garage}}</option>
                                                                                                            }} </option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-4">           
                                                                                    <div class="form-group label-floating">
                                                                                                        <label class="control-label">Driver Status</label>
                                                                                                        <select class="form-control" name="acountStatus" disabled>
                                                                                                            <option>{{  $garage->name_status_driver}}</option>
                                                                                                               
                                                                                                        </select>
                                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <div class="form-group label-floating">
                                                                                        <label class="control-label">Image</label>
                                                                                        <img src="/{{ $garage->driver_image }}" width="100px" name="passwordUser" class="form-control" disabled>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                            <h3 class="card-title" text-center>Bus </h3>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group label-floating">
                                                                        <label class="control-label">Bus Plate Number</label>
                                                                        <input type="text" class="form-control" name="busPlateNumber" value="{{ $garage->bus_plate_number}}" disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                        <div class="form-group label-floating">
                                                                            <label class="control-label">Bus type</label>
                                                                            <input type="text" class="form-control" name="busType" value="{{ $garage->name_bus_type }}" disabled> 
                                                                        </div>
                                                                </div>
                                                               <div class="col-md-4">
                                                                    <div class="form-group label-floating">
                                                                        <label class="control-label">Capacity</label>
                                                                        <input type="text" class="form-control" name="capacity" value="{{ $garage->capacity }}" disabled>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group label-floating">
                                                                        <label class="control-label">Status</label>
                                                                        <input type="text" class="form-control" name="busStatus" value="{{ $garage->name_bus_status }}" disabled>
                                                                    </div>
                                                                </div>    
                                                                <div class="col-md-4">
                                                                    <div class="form-group label-floating">
                                                                        <label class="control-label">Image</label>
                                                                        <img src="/{{ $garage->bus_image }}"  name="busImage" class="form-control" disabled>

                                                                    </div>
                                                                </div>
                                                                
                                                                </div>
                                                            
                                        </div>
                                                            
                                                            
                                                        {{-- </form> --}}
                                </div>
                            </div>
                        </div>
                    </div>
</div>
@endsection