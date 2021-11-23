@extends('layouts.app')
@section('title', 'Watch Dog')
@section('plugin-css')

@endsection
@section('plugin-js')
@endsection

@section('content')



<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SmartISP</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Server</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    </ol>
                </div>
                <h4 class="page-title">@yield('title')</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#custom-modal"><i class="mdi mdi-plus-circle mr-1"></i> Add Server</button>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-right">
                                <button type="button" class="btn btn-success mb-2 mr-1"><i class="mdi mdi-cog"></i></button>
                                <button type="button" class="btn btn-light mb-2 mr-1">Import</button>
                                <button type="button" class="btn btn-light mb-2">Export</button>
                            </div>
                        </div><!-- end col-->
                        <div class="col-sm-12"></div>
                    </div>

                    <div class="form-group">
                    @include('inc.flash-message')

                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap table-striped" id="products-datatable">
                            <thead>
                                <tr>
                                    <th style="width: 20px;">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                        </div>
                                    </th>
                                    <th>Name</th>
                                    <th>IP</th>
                                    <th>Port</th>
                                    <th>Status</th>
                                    <th>Mac</th>
                                    <th>Type</th>
                                    <th>Active</th>
                                    <th>Check</th>
                                    <th style="width: 85px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($servers as $server)
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td class="table-user">

                                        <a href="watchdog/view/{{$server->id}}"  class="text-body font-weight-semibold">{{$server->name}}</a>
                                    </td>
                                    <td>{{$server->ip}}</td>
                                    <td>{{$server->port}}</td>
                                    <td>{{$server->status}}</td>
                                    <td>{{$server->macAddress}}</td>
                                    <td>{{$server->type}}</td>
                                    <td>{{$server->isActive}}</td>
                                    <td>{{$server->lastCheak}}</td>

                                    <td>
                                        <a href="watchdog/edit/{{$server->id}}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                        <a href="watchdog/delete/{{$server->id}}" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                                @endforeach

                          

                            </tbody>
                        </table>
                    </div>

                    <ul class="pagination pagination-rounded justify-content-end mb-0">
                        <li class="page-item">
                            <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                                <span aria-hidden="true">«</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="javascript: void(0);">1</a></li>
                        <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                        <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a></li>
                        <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
                        <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
                        <li class="page-item">
                            <a class="page-link" href="javascript: void(0);" aria-label="Next">
                                <span aria-hidden="true">»</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

</div>



<div class="modal fade" id="custom-modal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">@yield('title')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-4">
                <form action="{{route('watchdog.index')}}" method="post">
                @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required="">
                    </div>
                    <div class="form-group">
                        <label for="companyId">Company ID</label>
                        <input type="text" class="form-control" id="companyId" name="companyId" placeholder="Enter ID" required="">
                    </div>
                    <div class="form-group">
                        <label for="ip">IP</label>
                        <input type="text" class="form-control" id="ip" name="ip" placeholder="Enter IP" required="">
                    </div>


                    <div class="form-group">
                        <label for="port">Port</label>
                        <input type="number" class="form-control" id="port" name="port" placeholder="Enter Port" required="">
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="number" class="form-control" id="port" name="status" placeholder="Enter Status" required="">
                    </div>


                    <div class="form-group">
                        <label for="macAddress">Mac Address</label>
                        <input type="text" class="form-control" id="macAddress" name="macAddress" placeholder="Enter Mac Address" required="">
                    </div>


                    <div class="form-group">
                        <label for="type">Type</label>
                        <select type="text" class="form-control" id="type" name="type"  required="">
                            <option selected disabled>Select</option>
                            <option value="By IP">By IP</option>
                            <option value="By MAC">By MAC</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="isActive">Active</label>
                        <input type="number" class="form-control" id="isActive" name="isActive"  required="">
                    </div>

                    
                    <div class="text-right">
                        <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>






@endsection