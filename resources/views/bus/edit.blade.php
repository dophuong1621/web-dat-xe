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
                                        <h4 class="card-title">Bus Edit
                                                        </h4>
                                                        <form method="POST" action="{{ route('bus.update', $bus->bus_id) }}">
                                                            @method("PUT")
                                                            @csrf
                                                            <div class="row">
                                                            <div class="col-md-4">           
                                                                                <div class="form-group label-floating">
                                                                                                    <label class="control-label">Garage</label>
                                                                                                    <select class="form-control" name="busGarage">
                                                                                                            <option value="{{ $bus->garage_id}}" selected>{{ $bus->name_garage}}</option>
                                                                                                                    @foreach ($bus_garage as $bg)
                                                                                                                        <option value="{{ $bg->garage_id }}"> {{ $bg->name_garage }} </option>
                                                                                                                            @endforeach    
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group label-floating ">
                                                                        <label class="control-label">Bus Plate Number</label>
                                                                        <input type="text" class="form-control" name="busPlateNumber" value="{{ $bus->bus_plate_number }}" >
                                                                    <span class="material-input"></span></div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                                <div class="form-group label-floating ">
                                                                                    <label class="control-label">Capacity</label>
                                                                                    <input type="text" class="form-control" name="busCapacity" value="{{ $bus->capacity }}" >
                                                                                <span class="material-input"></span></div>
                                                                            </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">           
                                                                                <div class="form-group label-floating">
                                                                                                    <label class="control-label">Type</label>
                                                                                                    <select class="form-control" name="busType">
                                                                                                            <option value="{{ $bus->bus_type}}" selected>{{ $bus->name_bus_type}}</option>
                                                                                                                    @foreach ($bus_type as $bt)
                                                                                                                        <option value="{{ $bt->bus_type_id }}"> {{ $bt->name_bus_type }} </option>
                                                                                                                            @endforeach    
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                </div>
                                                            <div class="col-md-4">           
                                                                                <div class="form-group label-floating">
                                                                                                    <label class="control-label">Status</label>
                                                                                                    <select class="form-control" name="busStatus">
                                                                                                            <option value="{{ $bus->bus_status_id}}" selected>{{ $bus->bus_status_name}}</option>
                                                                                                                    @foreach ($status_bus as $bs)
                                                                                                                        <option value="{{ $bs->bus_status_id }}"> {{ $bs->bus_status_name }} </option>
                                                                                                                            @endforeach    
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                </div>
                                                            {{-- <div class="col-md-4">
                                                                    <div class="form-group label-floating">
                                                                        <label class="control-label">Image</label>
                                                                        
                                                                        <img src="{{ $bus->bus_image }}" width="5%">
                                                                    </div>
                                                                </div> --}}
                                                        
                                                            </div>
                                        </div>
                                                            <div>
                                                            <button type="submit" class="btn btn-rose pull-right">Edit</button>
                                                            <div class="clearfix"></div>
                                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
</div>
@endsection