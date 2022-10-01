@extends('layouts.app')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">list</i>
                </div>
                <div class="card-content">
                <h4 class="card-title">Travel Schedule</h4>
                {{-- <form class="navbar-form navbar-left navbar-search-form" role="search">
                <div class="input-group">
                <input type="text" value="{{ $searchSchedule }}" name="search" class="form-control" placeholder="Search...">
                <span class="input-group-addon" style="margin-top: 55px">
                <button>
                    <i class="fa fa-search"></i>
                </button>
                                                                </span>
                                                            </div> 
                                                        </form> --}}
                                                        <div class="text-right">
                                                            <a rel="tooltip" title="" class="btn btn-primary" href="{{ route('travel-schedule.create') }}" data-original-title="Create">
                                                            <i class="ti-plus"> Add </i>
                                                        </a>
                                                        </div>
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>                    
                                                                <tr>
                                                                    <th class="text-center">ID</th>
                                                                    <th class="text-center">Starting Point</th>
                                                                    <th class="text-center">Destination</th>
                                                                    <th class="text-center">Schedule Date</th>
                                                                    <th class="text-center">Departume Time</th>
                                                                    <th class="text-center">Estivated Arrived Time</th>
                                                                    <th class="text-center">Fare amount</th>
                                                                    <th class="text-center">Remarks</th>
                                                                    <th class="text-center">Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr @foreach ($indexSchedule as $schedule)> 
                                                                                <td class="text-center">{{ $schedule->schedule_id }}</td>
                                                                                {{-- <td class="text-center">{{ $schedule->bus_id }}</td>
                                                                                <td class="text-center">{{ $schedule->driver_id }}</td> --}}
                                                                                <td class="text-center">{{ $schedule->starting_point }}</td>
                                                                                <td class="text-center">{{ $schedule->destination }}</td>
                                                                                <td class="text-center">{{ $schedule->schedule_date }}</td>
                                                                                <td class="text-center">{{ $schedule->departune_time }}</td>
                                                                                <td class="text-center">{{ $schedule->estivated_arrived_time }}</td>
                                                                                <td class="text-center">{{ $schedule->fare_amount }}</td>
                                                                                <td class="text-center">{{ $schedule->remarks }}</td>
                                                                                <td>
                                                                    <div class="td-actions text-center">
                                                                                {{-- <a  rel="tooltip" class="btn btn-info btn-simple" href="{{ route('bus.edit', $schedule->bus_id) }}">
                                                                                                    <i class="material-icons">person</i>
                                                                                </a> --}}
                                                                                                <button type="button" rel="tooltip" class="btn btn-success btn-simple">
                                                                                                    <i class="material-icons">edit</i>
                                                                                                </button>
                                                                                                <button type="button" rel="tooltip" class="btn btn-danger btn-simple">
                                                                                                    <i class="material-icons">close</i>
                                                                                                </button>
                                                                     </div>
                                                                </tr @endforeach> 
                                                            </tbody>
                                                        </table>
                                                        {{-- search --}}
                                                        <div class="text-center">
                                                            {{ $indexSchedule->appends([
                                                                'indexSchedule' => $indexSchedule
                                                            ])->links()}}   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>               
@endsection