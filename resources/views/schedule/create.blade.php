@extends('layouts.app')
@section('content')
<div class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">list</i>
                                </div>
                                <div class="card-content">
                                <h4 class="card-title">Add Travel Schedule</h4>
                                
                                    <div class="col-md-12">
                                        
                                        <form id="TypeValidation" class="form-horizontal" action="{{ route('travel-schedule.store')}}" method="post">
                                            @csrf
                                            <div class="row">
                                                            <label class="col-sm-2 label-on-left">Bus</label>
                                                            <div class="col-sm-7">
                                                                <div class="form-group label-floating">
                                                                    <label class="control-label"></label>
                                                                    <select class="form-control" name="bus">
                                                                        <option>Select</option>
                                                                        @foreach ($bus as $b)
                                                                          <option value="{{ $b->id }}"> {{ $b->bus_plate_number }} </option>
                                                                        @endforeach    
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-sm-2 label-on-left">Driver</label>
                                                            <div class="col-sm-7">
                                                                <div class="form-group label-floating">
                                                                    <label class="control-label"></label>
                                                                    <select class="form-control" name="garage">
                                                                        <option>Select</option>
                                                                        @foreach ($driver as $d)
                                                                          <option value="{{ $d->id }}"> {{ $d->fullname_driver. '(' . $d->name_garage .')' }} </option>
                                                                        @endforeach    
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                            
                                                <div class="row">
                                                    <label class="col-sm-2 label-on-left">Starting Point</label>
                                                    <div class="col-sm-7">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label"></label>
                                                            <input class="form-control" type="text" name="startingPoint" required="true" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 label-on-left">Destination</label>
                                                    <div class="col-sm-7">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label"></label>
                                                            <input class="form-control" type="text" name="destination" required="true" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 label-on-left">Schedule Date</label>
                                                    <div class="col-sm-7">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label"></label>
                                                            <input class="form-control" type="date" name="scheduleDate" required="true" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                            <label class="col-sm-2 label-on-left">Departune Time</label>
                                                            <div class="col-sm-7">
                                                                <div class="form-group label-floating">
                                                                    <label class="control-label"></label>
                                                                    <input class="form-control" type="time" name="departuneTime" required="true" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-sm-2 label-on-left">Estivated Arrived Time</label>
                                                            <div class="col-sm-7">
                                                                <div class="form-group label-floating">
                                                                    <label class="control-label"></label>
                                                                    <input class="form-control" type="time" name="estivatedArrivedTime" required="true" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                <div class="row">
                                                    <label class="col-sm-2 label-on-left">Fare Amount</label>
                                                    <div class="col-sm-7">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label"></label>
                                                            <input class="form-control" type="number" name="fareAmount" required="true" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="row">
                                                            <label class="col-sm-2 label-on-left">Schedule Map</label>
                                                            <div class="col-sm-7">
                                                                <div class="form-group label-floating">
                                                                    <label class="control-label"></label>
                                                                    <input class="form-control" type="file" name="scheduleMap" required="true" />
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <div class="row">
                                                            <label class="col-sm-2 label-on-left">Capacity</label>
                                                            <div class="col-sm-7">
                                                                <div class="form-group label-floating">
                                                                    <label class="control-label"></label>
                                                                    <input class="form-control" type="number" name="capacity" required="true" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                <div class="row">
                                                            <label class="col-sm-2 label-on-left">Remarks</label>
                                                            <div class="col-sm-7">
                                                                <div class="form-group label-floating">
                                                                    <label class="control-label"></label>
                                                                    <input class="form-control" type="text" name="remarks" required="true" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                
                                            </div>
                                            <div class="card-footer text-center">
                                                <button type="submit" class="btn btn-rose btn-fill">Add Driver</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                                                   
                                                            </div>
                                                        </div>
                
                                                        </div>
@endsection
