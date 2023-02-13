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
                                <h4 class="card-title">Add User</h4>
                                
                                    <div class="col-md-12">
                                        
                                            <form id="TypeValidation" class="form-horizontal" action="{{ route('user.store')}}" method="post">
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
                                                        <label class="col-sm-2 label-on-left">Email</label>
                                                        <div class="col-sm-7">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label"></label>
                                                                <input class="form-control" type="email" name="email" email="true" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-sm-2 label-on-left">Password</label>
                                                        <div class="col-sm-7">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label"></label>
                                                                <input class="form-control" type="password" name="pass" required="true" />
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
                                                        <label class="col-sm-2 label-on-left">Số điện thoại</label>
                                                        <div class="col-sm-7">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label"></label>
                                                                <input class="form-control" type="tel" name="contact" required="true" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-sm-2 label-on-left">Acount Category</label>
                                                        <div class="col-sm-7">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label"></label>
                                                                <select class="form-control" name="acountCategory">
                                                                    <option>Select</option>
                                                                    @foreach ($acount_category as $ac)
                                                                      <option value="{{ $ac->id}}"> {{ $ac->name_acount_category }} </option>
                                                                    @endforeach    
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-sm-2 label-on-left">Acount Status</label>
                                                        <div class="col-sm-7">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label"></label>
                                                                <select class="form-control" name="acountStatus">
                                                                    <option>Select</option>
                                                                    @foreach ($status_user as $at)
                                                                    <option value="{{ $at->id }}"> {{ $at->name_status }} </option>
                                                                  @endforeach    
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer text-center">
                                                    <button type="submit" class="btn btn-rose btn-fill">Add User</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
</div>
@endsection
