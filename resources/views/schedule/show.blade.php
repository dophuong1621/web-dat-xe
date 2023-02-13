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
                    <h4 class="card-title">Show Travel Schedule </h4>
                    <h3 class="card-title" text-center>Travel Schedule </h3>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group label-floating ">
                                <label class="control-label">Stating Point</label>
                                <input type="text" class="form-control" name="startingPoint" value="{{ $schedule[0]->starting_point }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group label-floating ">
                                <label class="control-label">Destination </label>
                                <input type="text" class="form-control" name="destination" value="{{ $schedule[0]->destination }}" disabled>
                                <span class="material-input"></span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                <label class="control-label">Date</label>
                                <input type="date" class="form-control" name="scheduleDate" value="{{ $schedule[0]->schedule_date}}" disabled>
                                <span class="material-input"></span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                <label class="control-label">Departune Time</label>
                                <input type="time" class="form-control" name="departuneTime" value="{{ $schedule[0]->departune_time}}" disabled>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                <label class="control-label"> Estivated Arrived Time</label>
                                <input type="time" class="form-control" name="estivatedArrivedTime" value="{{ $schedule[0]->estivated_arrived_time }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                <label class="control-label"> Fare Amount</label>
                                <input type="number" class="form-control" name="fareAmount" value="{{ number_format($schedule[0]->fare_amount,0,'.','.') }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                <label class="control-label"> Capacity</label>
                                <input type="number" class="form-control" name="capacity" value="{{ $schedule[0]->capacity }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                <label class="control-label">Remarks</label>
                                <input type="text" class="form-control" name="remarks" value="{{ $schedule[0]->remarks }}" disabled>
                            </div>
                        </div>
                    </div>

                    <h3 class="card-title" text-center>Driver </h3>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group label-floating ">
                                <label class="control-label">Fullname</label>
                                <input type="text" class="form-control" name="fullnameDriver" value="{{ $schedule[0]->driver->fullname_driver }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group label-floating ">
                                <label class="control-label">Date of Birth</label>
                                <input type="date" class="form-control" name="dobDriver" value="{{ $schedule[0]->driver->dob_driver }}" disabled>
                                <span class="material-input"></span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                <label class="control-label">Contact</label>
                                <input type="float" class="form-control" name="contactDriver" value="{{ $schedule[0]->driver->contact_driver}}" disabled>
                                <span class="material-input"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                <label class="control-label">Email Address</label>
                                <input type="text" class="form-control" name="emailDriver" value="{{ $schedule[0]->driver->email_driver}}" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                <label class="control-label">Driver Garage</label>

                                <select class="form-control" name="driverGarage" disabled>
                                    <option>{{ $schedule[0]->driver->driverGarage[0]->name_garage}}</option>
                                    }} </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                <label class="control-label">Driver Status</label>
                                <select class="form-control" name="acountStatus" disabled>
                                    <option>{{ $schedule[0]->driver->driverStatus[0]->name_status_driver}}</option>

                                </select>
                            </div>
                        </div>
                        @if($schedule[0]->driver->driver_image != '')
                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                <label class="control-label">Image</label>
                                <img src="/{{ $schedule[0]->driver->driver_image }}" width="100px" name="passwordUser" class="form-control" disabled>
                            </div>
                        </div>
                        @endif
                    </div>
                    <h3 class="card-title" text-center>Bus </h3>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                <label class="control-label">Bus Plate Number</label>
                                <input type="text" class="form-control" name="busPlateNumber" value="{{ $schedule[0]->bus->bus_plate_number}}" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                <label class="control-label">Bus Garage</label>
                                <input type="text" class="form-control" name="busGarage" value="{{ $schedule[0]->bus->busGarage[0]->name_garage }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                <label class="control-label">Bus Type</label>
                                <input type="text" class="form-control" name="busType" value="{{ $schedule[0]->bus->busType[0]->name_bus_type }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                <label class="control-label">Capacity</label>
                                <input type="text" class="form-control" name="capacity" value="{{ $schedule[0]->bus->capacity }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                <label class="control-label">Status</label>
                                <input type="text" class="form-control" name="busStatus" value="{{ $schedule[0]->bus->busStatus[0]->name_bus_status }}" disabled>
                            </div>
                        </div>
                        @if($schedule[0]->bus->bus_image != '')

                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                <label class="control-label">Image</label>
                                <img src="/{{ $schedule[0]->bus->bus_image }}" name="busImage" class="form-control" disabled>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
