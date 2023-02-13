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
                <h4 class="card-title">Bus</h4>
                {{-- <form class="navbar-form navbar-left navbar-search-form" role="search">
                <div class="input-group">
                <input type="text" value="{{ $searchBus }}" name="search" class="form-control" placeholder="Search...">
                <span class="input-group-addon" style="margin-top: 55px">
                <button>
                    <i class="fa fa-search"></i>
                </button>
                                                                </span>
                                                            </div>
                                                        </form> --}}
                                                        <div class="text-right">
                                                            <a rel="tooltip" title="" class="btn btn-primary" href="{{ route('bus.create') }}" data-original-title="Create">
                                                            <i class="ti-plus"> Add </i>
                                                        </a>
                                                        </div>
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">ID</th>
                                                                    <th class="text-center">Garage</th>
                                                                    <th class="text-center">Plate Number</th>
                                                                    <th class="text-center">Bus Type</th>
                                                                    <th class="text-center">Capacity</th>
                                                                    <th class="text-center">Status</th>
                                                                    <th class="text-center">Image</th>
                                                                    <th class="text-center">Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr @foreach ($indexBus as $bus)>
                                                                                <td class="text-center">{{ $bus->id }}</td>
                                                                                <td class="text-center">{{ $bus->busGarage[0]->name_garage }}</td>
                                                                                <td class="text-center">{{ $bus->bus_plate_number }}</td>
                                                                                <td class="text-center">{{ $bus->busType[0]->name_bus_type }}</td>
                                                                                <td class="text-center">{{ $bus->capacity }}</td>
                                                                                <td class="text-center">{{ $bus->busStatus[0]->name_bus_status }}</td>
                                                                                <td class="text-center"><img src="{{ $bus->bus_image }}" style="width:50px; height: 50px"></td>
                                                                                <td>
                                                                    <div class="td-actions text-center">
                                                                                <a  rel="tooltip" class="btn btn-info btn-simple" href="{{ route('bus.edit', $bus->id) }}">
                                                                                                    <i class="material-icons">edit</i>
                                                                                </a>
                                                                                                {{-- <button type="button" rel="tooltip" class="btn btn-success btn-simple">
                                                                                                    <i class="material-icons">edit</i>
                                                                                                </button>
                                                                                                <button type="button" rel="tooltip" class="btn btn-danger btn-simple">
                                                                                                    <i class="material-icons">close</i>
                                                                                                </button> --}}
                                                            </div>
                                                                </tr @endforeach>
                                                            </tbody>
                                                        </table>
                                                        {{-- search --}}
                                                        <div class="text-center">
                                                            {{ $indexBus->appends([
                                                                'indexBus' => $indexBus
                                                            ])->links()}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
        </div>
    </div>
</div>
@endsection
