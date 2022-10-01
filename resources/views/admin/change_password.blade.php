@extends('layouts.app')
@section('content')
<div class="content">
                    <div class="col-md-6">
                                        <div class="card">
                                            <form id="form-change-password" method="POST" action="{{ route('updatePass') }}" >
                                                            @csrf
                                                <div class="card-header card-header-icon" data-background-color="rose">
                                                    <i class="material-icons">mail_outline</i>
                                                </div>
                                                <div class="card-content">
                                                    <h4 class="card-title">Change Password Forms</h4>
                                                    @if(session('error'))
                                                            <div class="alert alert-danger" role="alert">
                                                                                {{session('error')}}
                                                            </div>
                                                    @endif
                                                    <div class="form-group label-floating">
                                                        <label class="control-label" for="current_password">
                                                            Current 
                                                            <small>*</small>
                                                        </label>
                                                        <input class="form-control"  name="current_password" type="password" required="true" />
                                                        @if($errors->has('current_password'))
                                                        <span class="error-text">
                                                                            {{$errors->first('current_password')}}
                                                        </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label" for="password">
                                                            New
                                                            <small>*</small>
                                                        </label>
                                                        <input class="form-control" name="password" id="password" type="password" required="true" />
                                                        @if($errors->has('password'))
                                                        <span class="error-text">
                                                                            {{$errors->first('password')}}
                                                        </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label" for="password_confirm">
                                                            Retype new
                                                            <small>*</small>
                                                        </label>
                                                        <input class="form-control" name="password_confirm" id="password_confirm" type="password" required="true" equalTo="#registerPassword" />
                                                        @if($errors->has('password_confirm'))
                                                        <span class="error-text">
                                                                            {{$errors->first('password_confirm')}}
                                                        </span>
                                                        @endif
                                                    </div>

                                                    <div class="form-footer text-right">
                                                        
                                                        <button type="submit" class="btn btn-rose btn-fill">Save changes</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
</div>
@endsection