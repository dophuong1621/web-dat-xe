@extends('layouts.app')
@section('content')
<div class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">manage_accounts</i>
                                </div>  
                                <div class="card-content">
                                        <h4 class="card-title">Edit Profile - Admin 
                                                        </h4>
                                                        <form method="POST" action="{{ route('profile-update', $profile->id) }}">
                                                            @method("PUT")
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group label-floating ">
                                                                        <label class="control-label">Fullname</label>
                                                                        <input type="text" class="form-control" name="fullnameadmin" value="{{ $profile->fullname_admin }}" ></div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group label-floating ">
                                                                        <label class="control-label">Date of Birth</label>
                                                                        <input type="date" class="form-control" name="dobAdmin" value="{{ $profile->dob_admin }}" >
                                                                    <span class="material-input"></span></div>
                                                                </div>
                                                            
                                                            <div class="col-md-4">
                                                                <div class="form-group label-floating">
                                                                    <label class="control-label">Contact</label>
                                                                    <input type="float" class="form-control" name="contactAdmin" value="{{ $profile->contact_admin}}" >
                                                                <span class="material-input"></span></div>
                                                            </div>
                                                        
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group label-floating">
                                                                        <label class="control-label">Email Address</label>
                                                                        <input type="text" class="form-control" name="emailAdmin" value="{{ $profile->email_admin}}" >
                                                                    </div>
                                                                </div>
                                                                {{-- <div class="col-md-4">
                                                                    <div class="form-group label-floating">
                                                                        <label class="control-label">Password</label>
                                                                        <input type="text" class="form-control" name="passwordAdmin" value="{{ $profile->password_admin}}" >
                                                                        
                                                                    </div>
                                                                </div> --}}
                                                                
                                                                <button type="submit" class="btn btn-rose pull-right">Edit Profile</button>
                                                                <div class="clearfix"></div>
                                                                            </div>
                                                           
                                                            </div>
                                                            
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
</div>
@endsection