@extends('layouts.app')
@section('title', 'watchdog')
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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">-</a></li>
                        <li class="breadcrumb-item active">@yield('title') View</li>
                    </ol>
                </div>
                <h4 class="page-title">@yield('title') View</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->



    <div class="row">

        <div class="col-lg-6">
            <div class="card-box">
                <div class="media mb-3">
                   
                    <div class="media-body">
                        <h4 class="mt-0 mb-1">{{$server->name}}</h4><br>
                        <p class="text-muted" >IP Address: {{$server->ip}}</p>

                        <p class="text-muted" >Company ID: {{$server->companyId}}</p>
                        
                        <p class="text-muted">Port Number: {{$server->port}}</p>
                        <p class="text-muted">Current Status: {{$server->status}}</p>
                        <p class="text-muted">Last Check: {{$server->lastCheak}}</p>
                        <p class="text-muted">Mac Address: {{$server->macAddress}}</p>
                        <p class="text-muted">Type: {{$server->type}}</p>
                        <p class="text-muted">Active :{{$server->isActive}}</p>

                       
                    </div>
                </div>
               


            </div> <!-- end card-box-->
        </div>
    </div>


    <!-- end row -->

</div>


@endsection