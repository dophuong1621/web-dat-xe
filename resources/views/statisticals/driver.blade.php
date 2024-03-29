    @extends('layouts.app')
@section('content')
<div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-header-icon" data-background-color="purple">
                                        <i class="material-icons">assignment</i>
                                    </div>
                                    <div class="card-content">
                                        <h4 class="card-title">DataTables.Driver</h4>
                                        <div class="toolbar">
                                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                                        </div>
                                        <div class="material-datatables">
                                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">ID</th>
                                                        <th class="text-center">Name</th>
                                                        <th class="text-center">Email</th>
                                                        <th class="text-center">Contact</th>
                                                        <th class="text-center">Invoice Quantity</th>
                                                        <th class="text-center">Actions</th>
                                                    </tr>
                                                </thead>
                                                {{-- <tfoot>
                                                    <tr>
                                                        <th class="text-center">ID</th>
                                                        <th class="text-center">Name</th>
                                                        <th class="text-center">Email</th>
                                                        <th class="text-center">Contact</th>
                                                        <th class="text-center">Invoice Quantity</th>
                                                        <th class="text-center">Actions</th>
                                                    </tr>
                                                </tfoot> --}}
                                                <tbody>
                                                    <tr @foreach($indexDr as $driver)>
                                                        <td class="text-center">{{ $driver->id }}</td>
                                                        <td class="text-center">{{ $driver->fullname_driver }}</td>
                                                        <td class="text-center">{{ $driver->email_driver }}</td>
                                                        <td class="text-center">{{ $driver->contact_driver }}</td>
                                                        <td class="text-center">{{ $driver->tongHoaDon }}</td>
                                                        <td class="text-center"  >
                                                            <a href="#" class="btn btn-info btn-simple"><i class="material-icons">visibility</i></a>
                                                                {{-- <a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="material-icons">dvr</i></a>
                                                                <a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons">close</i></a> --}}
                                                        </td>
                                                    </tr @endforeach>
                                                    
                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                {{ $indexDr->appends([
                                                    'indexDr' => $indexDr
                                                ])->links()}}   
                                        </div>
                                        </div>
                                    </div>
                                    <!-- end content-->
                                </div>
                                <!--  end card  -->
                            </div>
                            <!-- end col-md-12 -->
                        </div>
                        <!-- end row -->
                    </div>
                </div>
@endsection