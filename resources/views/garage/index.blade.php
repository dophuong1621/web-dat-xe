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
                <h4 class="card-title">Garage</h4>
                {{-- <form class="navbar-form navbar-left navbar-search-form" role="search">
                <div class="input-group">
                <input type="text" value="{{ $searchGarage }}" name="search" class="form-control" placeholder="Search...">
                <span class="input-group-addon" style="margin-top: 55px">
                <button>
                    <i class="fa fa-search"></i>
                </button>
                                                                </span>
                                                            </div> 
                                                        </form> --}}
                                                        <div class="text-right">
                                                            <a rel="tooltip" title="" class="btn btn-primary" href="{{ route('garage.create') }}" data-original-title="Create">
                                                            <i class="ti-plus"> Add </i>
                                                        </a>
                                                        </div>
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>                    
                                                                <tr>
                                                                    <th class="text-center">ID</th>
                                                                    <th class="text-center">Name </th>
                                                                    <th class="text-center">Email</th>
                                                                    <th class="text-center">Contact</th>
                                                                    <th class="text-center">Address</th>
                                                                    <th class="text-center">Status</th>
                                                                    <th class="text-center">Image</th>
                                                                    <th class="text-center">Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr @foreach ($indexGarage as $garage)>   
                                                                                <td class="text-center">{{ $garage->garage_id }}</td>
                                                                                <td class="text-center">{{ $garage->name_garage }}</td>
                                                                                <td class="text-center">{{ $garage->email_garage }}</td>
                                                                                <td class="text-center">{{ $garage->contact_garage }}</td>
                                                                                <td class="text-center">{{ $garage->address_garage}}
                                                                                <td class="text-center">{{ $garage->name_status_garage }}</td>
                                                                                <td class="text-center"><img src="{{ $garage->garage_image }}" style="width:50px; height: 50px"></td>
                                                                                <td>
                                                                    <div class="td-actions text-center">
                                                                                <a  rel="tooltip" class="btn btn-info btn-simple" href="{{ route('garage.show', $garage->garage_id) }}">
                                                                                                    <i class="material-icons">visibility</i>
                                                                                </a>
                                                                                <a  rel="tooltip" class="btn btn-info btn-simple" href="{{ route('garage.edit', $garage->garage_id) }}" data-original-title="Edit">
                                                                                                    <i class="material-icons">edit</i>
                                                                                </a>
                                                                                                <!-- <button type="button" rel="tooltip" class="btn btn-danger btn-simple">
                                                                                                    <i class="material-icons">close</i>
                                                                                                </button> -->
                                                            </div>
                                                                </tr @endforeach> 
                                                            </tbody>
                                                        </table>
                                                        {{-- search --}}
                                                        <div class="text-center">
                                                            {{ $indexGarage->appends([
                                                                'indexGarage' => $indexGarage
                                                            ])->links()}}   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>               
@endsection