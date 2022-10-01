@extends('layouts.app')
@section('content')
<div class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">person_add</i>
                                </div>
                                <div class="card-content">
                                <h4 class="card-title">Add Driver</h4>
                                    <div class="col-md-12">
                                        <form id="TypeValidation" enctype="multipart/form-data" action="{{ route('driver.store')}}" method="post" class="form-horizontal">
                                            @csrf
                                            <div class="card-content">
                                                <div class="row">
                                                    <label class="col-sm-2 label-on-left">Họ và tên</label>
                                                    <div class="col-sm-7">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label"></label>
                                                            <input class="form-control" type="text"name="fullname" name="required" required="true" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 label-on-left">Giởi tính</label>
                                                    <div class="col-sm-7">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label"></label>
                                                            <select class="form-control" name="gender">
                                                                <option>Select</option>
                                                                @foreach ($gender as $gd)
                                                                  <option value="{{ $gd->gender_id }}"> {{ $gd->gender_name }} </option>
                                                                @endforeach    
                                                            </select>  
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                                <div class="row">
                                                    <label class="col-sm-2 label-on-left">Ngày Sinh</label>
                                                    <div class="col-sm-7">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label"></label>
                                                            <input class="form-control" type="date" name="dob" required="true" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 label-on-left">Email</label>
                                                    <div class="col-sm-7">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label"></label>
                                                            <input class="form-control" type="email" name="email" email="true" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 label-on-left">Số điện thoại</label>
                                                    <div class="col-sm-7">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label"></label>
                                                            <input class="form-control" type="tel" name="contact" required="true" />
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                <div class="row">
                                                    <label class="col-sm-2 label-on-left">Garage</label>
                                                    <div class="col-sm-7">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label"></label>
                                                            <select class="form-control" name="garage">
                                                                <option>Select</option>
                                                                @foreach ($garage as $g)
                                                                  <option value="{{ $g->garage_id }}"> {{ $g->name_garage }} </option>
                                                                @endforeach    
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 label-on-left">Status</label>
                                                    <div class="col-sm-7">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label"></label>
                                                            <select class="form-control" name="statusDriver">
                                                                <option>Select</option>
                                                                @foreach ($statusDriver as $sd)
                                                                <option value="{{ $sd->status_driver_id }}"> {{ $sd->name_status_driver }} </option>
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
