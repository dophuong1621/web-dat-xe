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
                <h4 class="card-title">Driver</h4>
                {{-- <form class="navbar-form navbar-left navbar-search-form" role="search">
                <div class="input-group">
                <input type="text" value="{{ $searchDriver }}" name="search" class="form-control" placeholder="Search...">
                <span class="input-group-addon" style="margin-top: 55px">
                <button>
                    <i class="fa fa-search"></i>
                </button>
                                                                </span>
                                                            </div> 
                                                        </form> --}}
                                                        <div class="text-right">
                                                            <a rel="tooltip" title="" class="btn btn-primary" href="{{ route('driver.create') }}" data-original-title="Create">
                                                            <i class="ti-plus"> Add </i>
                                                        </a>
                                                        </div>
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>                    
                                                                <tr>
                                                                    <th class="text-center">ID</th>
                                                                    <th class="text-center">Fullname</th>
                                                                    <th class="text-center">Gender</th>
                                                                    <th class="text-center">Email</th>
                                                                    <th class="text-center">DOB</th>
                                                                    <th class="text-center">Phone Number</th>
                                                                    <th class="text-center">Garage</th>
                                                                    <th class="text-center">Status</th>
                                                                    <th class="text-center">Image</th>
                                                                    <th class="text-center">Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr @foreach ($indexDriver as $driver)>  
                                                                                <td class="text-center">{{ $driver->id }}</td>
                                                                                <td class="text-center">{{ $driver->fullname_driver }}</td>
                                                                                <td class="text-center">{{ $driver->gender_name }}</td>
                                                                                <td class="text-center">{{ $driver->email_driver }}</td>
                                                                                <td class="text-center">{{ $driver->dob_driver }}</td>
                                                                                <td class="text-center">{{ $driver->contact_driver }}</td>
                                                                                <td class="text-center">{{ $driver->name_garage}}
                                                                                <td class="text-center">{{ $driver->name_status_driver }}</td>
                                                                                <td class="text-center"><img src="{{ $driver->driver_image }}" style="width:50px; height: 50px"></td>
                                                                                <td>
                                                                    <div class="td-actions text-center">
                                                                                <a  rel="tooltip" class="btn btn-info btn-simple" href="{{ route('driver.edit', $driver->id) }}" data-original-title="Edit">
                                                                                                    <i class="material-icons">edit</i>
                                                                                </a>
                                                                                               
                                                            </div>
                                                                </tr @endforeach>
                                                            </tbody>
                                                        </table>
                                                        {{-- search --}}
                                                        <div class="text-center">
                                                            {{ $indexDriver->appends([
                                                                'indexDriver' => $indexDriver
                                                            ])->links()}}   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
        </div>
    </div>
</div>           
@endsection