@extends('layouts.app')
@section('title', 'Server Edit')
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
                        <li class="breadcrumb-item active">{{$data->name}}</li>
                    </ol>
                </div>
                <h4 class="page-title">Server - {{$data->name}}</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->



    <div class="row">

        <div class="col-lg-6">
            <div class="card-box">
               <div class="modal-content">
            
            <div class="modal-body p-4">
            <form action="{{route('server.index')}}/edit/{{$data->id}}" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$data->name}}" placeholder="Enter name" required="">
                    </div>
                    <div class="form-group">
                        <label for="code">IP</label>
                        <input type="text" class="form-control" id="ip" name="ip" value="{{$data->ip}}" placeholder="Enter IP" required="">
                    </div>


                    <div class="form-group">
                        <label for="description">DNS Name</label>
                        <input type="text" class="form-control" id="dnsName" name="dnsName" value="{{$data->dnsName}}" placeholder="Enter dns Name" required="">
                    </div>






                   


                    <div class="form-group">
                        <label for="port">Port</label>
                        <input type="number" class="form-control" id="port" name="port" value="{{$data->port}}" placeholder="Enter port" required="">
                    </div>


                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="{{$data->username}}" placeholder="Enter username" required="">
                    </div>


                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="{{$data->password}}" placeholder="Enter password" required="">
                    </div>


                    @csrf
                    <div class="text-right">
                        <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
            </div> <!-- end card-box-->
        </div>
    </div>


    <!-- end row -->

</div>
    

                
@endsection