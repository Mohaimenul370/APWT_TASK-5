@extends('layouts.app')
@section('title', 'Users')
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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
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
                            <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#custom-modal"><i class="mdi mdi-plus-circle mr-1"></i> Add @yield('title')</button>
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
                                    <th>Role</th>
                                    <th>Email</th>
                                    <th>Phone No</th>
                                    <th>Balance</th>
                                    <th>Commission</th>
                                    <th>Status</th>
                                    <th>Reg Date</th>
                                    <th style="width: 85px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach($users as $data)
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td class="table-user">
                                        <a href="/view/{{$data->id}}" target="watchdog" class="text-body font-weight-semibold">{{$data->name}}</a>
                                    </td>

                                    <td>
                                        @if ($data->userType == 1)
                                        <span class="badge badge-soft-success">Admin</span>
                                        @elseif ($data->userType == 2)
                                        <span class="badge badge-soft-primary">Company</span>
                                        @elseif ($data->userType == 3)
                                        <span class="badge badge-soft-warning">Reseller</span>
                                        @endif
                                    </td>


                                    <td>{{$data->email}}</td>
                                    <td>{{$data->phoneNo}}</td>
                                    <td>{{$data->balance}}</td>
                                    <td>{{$data->commission}}</td>
                                    <td>
                                        @if ($data->isActive == 1)
                                        <span class="badge badge-soft-success">Active</span>
                                        @elseif ($data->isActive == 2)
                                        <span class="badge badge-soft-danger">Block</span>
                                        @elseif ($data->isActive == 0)
                                        <span class="badge badge-soft-secondary">InActive</span>
                                        @endif
                                    </td>
                                    <td>{{$data->created_at}}</td>
                                    <td>
                                        <a href="{{route('admin.user.index')}}/edit/{{$data->id}}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                        <a href="{{route('admin.user.index')}}/delete/{{$data->id}}" class="action-icon"> <i class="mdi mdi-delete"></i></a>
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
                <form action="{{route('admin.user.index')}}" method="post">

                <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{$data->name}}" placeholder="Enter name" required="">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{$data->email}}" placeholder="Enter Email" required="">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="phoneNo">Phone No</label>
                        <input type="text" onblur="valid_mobile(this.value);" class="form-control @error('phoneNo') is-invalid @enderror" id="phoneNo" name="phoneNo" value="{{$data->phoneNo}}" placeholder="Enter Phone No" required="">
                        @error('phoneNo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="balance">Balance</label>
                        <input type="text" class="form-control @error('balance') is-invalid @enderror" id="balance" name="balance" value="{{$data->balance}}" placeholder="Enter Balance" required="">
                        @error('balance')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>



                    <div class="form-group">
                        <label for="commission">Commission</label>
                        <input type="text" class="form-control @error('commission') is-invalid @enderror" id="commission" name="commission" value="{{$data->commission}}" placeholder="Enter Commission" required="">
                        @error('balance')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="" placeholder="Enter Password" required="">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    @csrf
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