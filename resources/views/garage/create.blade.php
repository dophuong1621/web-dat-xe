@extends('layouts.app')
@section('content')
<div class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">maps_home_work</i>
                                </div>
                                <div class="card-content">
                                <h4 class="card-title">Add Garage</h4>
                                    <div class="col-md-12">
                                        <form id="TypeValidation" enctype="multipart/form-data" action="{{ route('garage.store')}}" method="post" class="form-horizontal">
                                            @csrf
                                            <div class="card-content">
                                                            <div class="row">
                                                                                <label class="col-sm-2 label-on-left">Name Garage</label>
                                                                                <div class="col-sm-7">
                                                                                    <div class="form-group label-floating">
                                                                                        <label class="control-label"></label>
                                                                                        <input class="form-control" type="text" name="nameGarage" email="true" />
                                                                                    </div>
                                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                                <label class="col-sm-2 label-on-left">Email</label>
                                                                                <div class="col-sm-7">
                                                                                    <div class="form-group label-floating">
                                                                                        <label class="control-label"></label>
                                                                                        <input class="form-control" type="email" name="emailGarage" email="true" />
                                                                                    </div>
                                                                                </div>
                                                            </div>
                                            
                                                            <div class="row">
                                                                                <label class="col-sm-2 label-on-left">Số điện thoại</label>
                                                                                <div class="col-sm-7">
                                                                                    <div class="form-group label-floating">
                                                                                        <label class="control-label"></label>
                                                                                        <input class="form-control" type="tel" name="contactGarage" required="true" />
                                                                                    </div>
                                                                                </div>
                                                            </div>
                                                <div class="row">
                                                    <label class="col-sm-2 label-on-left">Address Garage</label>
                                                    <div class="col-sm-7">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label"></label>
                                                            <input class="form-control" type="text" name="addressGarage" required="true" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                            <label class="col-sm-2 label-on-left">Status </label>
                                                            <div class="col-sm-7">
                                                                <div class="form-group label-floating">
                                                                    <label class="control-label"></label>
                                                                    <select class="form-control" name="statusGarage">
                                                                        <option>Select</option>
                                                                        @foreach ($statusGarage as $st)
                                                                          <option value="{{ $st->status_garage_id }}"> {{ $st->name_status_garage }} </option>
                                                                        @endforeach    
                                                                    </select>
                                                                </div>
                                                            </div>
                                                </div>
                                                <div class="row">
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
                                            <div class="card-footer text-center">
                                                <button type="submit" class="btn btn-rose btn-fill">Add </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                                                   
                                                            </div>
                                                        </div>
                
                                                        </div>
@endsection
