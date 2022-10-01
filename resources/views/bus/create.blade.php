@extends('layouts.app')
@section('content')
<div class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">king_bed</i>
                                </div>
                                <div class="card-content">
                                <h4 class="card-title">Add Bus</h4>
                                    <div class="col-md-12">
                                        
                                        <form id="TypeValidation" class="form-horizontal" action="{{ route('bus.store')}}" method="POST" enctype="multipart/form-data">      
                                            @csrf
                                            <div class="card-content">
                                                            <div class="row">
                                                                                <label class="col-sm-2 label-on-left">Garage</label>
                                                                                <div class="col-sm-7">
                                                                                    <div class="form-group label-floating">
                                                                                        <label class="control-label"></label>
                                                                                        <select class="form-control" name="busGarage">
                                                                                            <option>Select</option>
                                                                                            @foreach ($busGarage as $g)
                                                                                              <option value="{{ $g->garage_id }}"> {{ $g->name_garage }} </option>
                                                                                            @endforeach    
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                <div class="row">
                                                    <label class="col-sm-2 label-on-left">Bus Plate Number</label>
                                                    <div class="col-sm-7">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label"></label>
                                                            <input class="form-control" type="text" name="busPlateNumber" required="true" />
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                                <div class="row">
                                                            <label class="col-sm-2 label-on-left">Bus Type</label>
                                                            <div class="col-sm-7">
                                                                <div class="form-group label-floating">
                                                                    <label class="control-label"></label>
                                                                    <select class="form-control" name="busType">
                                                                        <option>Select</option>
                                                                        @foreach ($busType as $bt)
                                                                        <option value="{{ $bt->bus_type_id }}"> {{ $bt->name_bus_type }} </option>
                                                                      @endforeach    
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
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
                                                    <label class="col-sm-2 label-on-left">Status</label>
                                                    <div class="col-sm-7">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label"></label>
                                                            <select class="form-control" name="busStatus">
                                                                <option>Select</option>
                                                                @foreach ($busStatus as $sb)
                                                                <option value="{{ $sb->bus_status_id }}"> {{ $sb->bus_status_name }} </option>
                                                              @endforeach    
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" >
                                                    <label class="col-sm-2 label-on-left">Image</label>
                                                    <div>
                                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail">
                                                                <img alt="...">
                                                            </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                            <div>
                                                                <span class="btn btn-rose btn-round btn-file">
                                                                    <span class="fileinput-new">Select image</span>
                                                                    <span class="fileinput-exists">Change</span>
                                                                    <input type="file" name="image" />
                                                                </span>
                                                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                                                                    data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer text-center">
                                                <button type="submit" class="btn btn-rose btn-fill">Add</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                                                   
                                                            </div>
                                                        </div>
                
                                                        </div>
@endsection
