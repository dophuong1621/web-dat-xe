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
                    <h4 class="card-title">Edit Travel Schedule </h4>
                    <form method="POST" action="{{ route('travel-schedule.update', $schedule->schedule_id) }}">
                        @method("PUT")
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Bus</label>
                                    <select class="form-control" name="bus">
                                        <option value="{{ $schedule->bus_id}}" selected>{{ $schedule->bus_plate_number}}</option>
                                        @foreach ($bus as $b)
                                        <option value="{{ $b->bus_id }}"> {{ $b->bus_plate_number }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Driver</label>
                                    <select class="form-control" name="driver">
                                        <option value="{{ $schedule->driver_id}}" selected>{{ $schedule->fullname_driver}}({{ $schedule->name_garage}})</option>
                                        @foreach ($driver as $d)
                                        <option value="{{ $d->driver_id }}">{{ $d->fullname_driver}}({{ $d->name_garage}}) </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group label-floating ">
                                    <label class="control-label">Starting Point</label>
                                    <input type="text" class="form-control" name="startingPoint" value="{{ $schedule->starting_point }}">
                                    <span class="material-input"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Destination</label>
                                    <input type="text" class="form-control" name="destination" value="{{ $schedule->destination}}">
                                    <span class="material-input"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group label-floating ">
                                    <label class="control-label">Date</label>
                                    <input type="date" class="form-control" name="scheduleDate" value="{{ $schedule->schedule_date }}">
                                    <span class="material-input"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating ">
                                    <label class="control-label">Departune Time</label>
                                    <input type="time" class="form-control" name="derpartuneTime" value="{{ $schedule->departune_time }}">
                                    <span class="material-input"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating ">
                                    <label class="control-label">Estivated Arrived Time</label>
                                    <input type="time" class="form-control" name="estivatedArrivedTime" value="{{ $schedule->estivated_arrived_time }}">
                                    <span class="material-input"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group label-floating ">
                                    <label class="control-label">Fare Amount</label>
                                    <input type="text" class="form-control" name="fareAmount" value="{{ $schedule->fare_amount }}">
                                    <span class="material-input"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating ">
                                    <label class="control-label">Capacity</label>
                                    <input type="number" class="form-control" name="capacity" value="{{ $schedule->capacity }}">
                                    <span class="material-input"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating ">
                                    <label class="control-label">Remarks</label>
                                    <input type="text" class="form-control" name="remarks" value="{{ $schedule->remarks }}">
                                    <span class="material-input"></span>
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