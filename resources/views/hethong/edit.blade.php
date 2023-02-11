@extends('layouts.app')
@section('content')
<div class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">perm_identity</i>
                                </div>  
                                <div class="card-content">
                                        <h4 class="card-title">Edit Profile -
                                                            <small class="category">Complete your profile</small>
                                                        </h4>
                                                        <form method="POST" action="{{ route('user.update', $user->user_id) }}">
                                                            @method("PUT")
                                                            @csrf
                                                            <div class="row">
                                                                
                                                                <div class="col-md-4">
                                                                    <div class="form-group label-floating ">
                                                                        <label class="control-label">Fullname</label>
                                                                        <input type="text" class="form-control" name="fullnameUser" value="{{ $user->fullname_user }}" ></div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group label-floating ">
                                                                        <label class="control-label">Date of Birth</label>
                                                                        <input type="date" class="form-control" name="dobUser" value="{{ $user->dob_user }}" >
                                                                    <span class="material-input"></span></div>
                                                                </div>
                                                            
                                                            <div class="col-md-4">
                                                                <div class="form-group label-floating">
                                                                    <label class="control-label">Contact</label>
                                                                    <input type="float" class="form-control" name="contactUser" value="{{ $user-> contact_user}}" >
                                                                <span class="material-input"></span></div>
                                                            </div>
                                                        
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group label-floating">
                                                                        <label class="control-label">Email Address</label>
                                                                        <input type="text" class="form-control" name="emailUser" value="{{ $user->email_user}}" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group label-floating">
                                                                        <label class="control-label">Password</label>
                                                                        <input type="password" class="form-control" name="passwordUser" value="{{ $user->password_user}}" >
                                                                    </div>
                                                                </div>
                                                                
                                                                 <div class="col-sm-5 col-sm-offset-1">           
                                                                                <div class="form-group label-floating">
                                                                                        <label class="control-label">Account category</label>
                                                                                        <select class="form-control" name="acountCategory">
                                                                                        <option value="{{ $user->acount_category_id}}" selected>{{ $user->name_acount_category}}</option>
                                                                                                @foreach ($acount_category as $ac)
                                                                                                    <option value="{{ $ac->acount_category_id }}"> {{ $ac->name_acount_category }} </option>
                                                                                                        @endforeach    
                                                                                                    </select>
                                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-5 col-sm-offset-1">           
                                                                                <div class="form-group label-floating">
                                                                                                    <label class="control-label">Account Status</label>
                                                                                                    <select class="form-control" name="acountStatus">
                                                                                                        <option value="{{ $user->status_id}}" selected>{{  $user->name_status}}</option>
                                                                                                        @foreach ($status_user as $at)
                                                                                                        <option value="{{ $at->status_id }}"> {{ $at->name_status }} </option>
                                                                                                      @endforeach    
                                                                                                    </select>
                                                                                                </div>
                                                                            </div>
                                                            </div>
                                                            <div>
                                                            <button type="submit" class="btn btn-rose pull-right">Edit Profile</button>
                                                            <div class="clearfix"></div>
                                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
</div>
@endsection