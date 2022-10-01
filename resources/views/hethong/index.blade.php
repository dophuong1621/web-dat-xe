@extends('layouts.app')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="card-content">
                <h4 class="card-title">User</h4>
                <div class="text-right">
                                                            <a rel="tooltip" title="" class="btn btn-primary" href="{{ route('user.create') }}" data-original-title="Create">
                                                            <i class="ti-plus">Add</i>
                                                            </a>
                                                        </div>
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>                    
                                                                <tr>
                                                                    <th class="text-center">ID</th>
                                                                    <th class="text-center">Name</th>
                                                                    <th class="text-center">Email</th>
                                                                    <th class="text-center">Password</th>
                                                                    <th class="text-center">DOB</th>
                                                                    <th class="text-center">Phone Number</th>
                                                                    <th class="text-center">Acount Type</th>
                                                                    <th class="text-center">Acount Status</th>
                                                                    <th class="text-center">Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr @foreach ($indexUser as $user)>
                                                                                <td class="text-center">{{ $user->user_id }}</td>
                                                                                <td class="text-center">{{ $user->full_name_user }}</td>
                                                                                <td class="text-center">{{ $user->email_user }}</td>
                                                                                <td class="text-center">*********</td>
                                                                                <td class="text-center">{{ $user->dob_user }}</td>
                                                                                <td class="text-center">{{ $user->contact_user }}</td>
                                                                                <td class="text-center">{{ $user->name_acount_category }}</td>
                                                                                <td class="text-center">{{ $user->name_status }}</td>
                                                                                <td class="text-center">
                                                                                <div class="td-actions text-center">
                                                                                <a  rel="tooltip" class="btn btn-info btn-simple" href="{{ route('user.edit', $user->user_id) }}" data-original-title="Edit">
                                                                                                    <i class="material-icons">edit</i>
                                                                                </a>
                                                                                                {{-- <form action="{{ route('user.destroy', $user->user_id) }}" method="POST" class="btn btn-simple btn-danger btn-icon table-action delete">
                                                                                                    @method('DELETE')
                                                                                                    @csrf
                                                                                                    
                                                                                                        <a rel="tooltip" title="" class="btn btn-simple btn-danger btn-icon table-action delete" href="{{ route('user.destroy', $user->user_id) }}" data-original-title="Delete">
                                                                                                        <i class="material-icons">close</i></a>
                                                                                                    
                                                                                                </form> --}}
                                                                                </div>
                                                                                </td>
                                                                </tr @endforeach>
                                                            </tbody>
                                                        </table>
                                                        {{-- search --}}
                                                        <div class="text-center">
                                                            {{ $indexUser->appends([
                                                                'indexUser' => $indexUser
                                                            ])->links()}}   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
        </div>
    </div>
</div>          
@endsection