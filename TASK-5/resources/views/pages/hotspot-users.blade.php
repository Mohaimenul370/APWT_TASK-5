@extends('layouts.app')
@section('title', 'Hotspot Users')
@section('plugin-css')
<!-- third party css -->
<link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<!-- third party css end1-->
@endsection
@section('plugin-js')
<!-- third party js -->
<script src="{{asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-select/js/dataTables.select.min.js')}}"></script>
<script src="{{asset('assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
<!-- third party js ends -->

<!-- Datatables init -->
<script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>
@endsection

@section('content')

<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">{{$siteName}}</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
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
                <div class="card-header">
                    <span class="float-left"><i onclick="location.reload();" class="fas fa-sync-alt pointer" title="Reload data"></i></span>
                </div>
                <div class="card-body">
                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">

                        <thead>
                            <tr>
                                <th style="min-width:50px;" class="align-middle text-center" id="cuser">{{count($datasets)}}</th>
                                <th class="pointer" title="Click to sort"></i> C.ID</th>
                                <th class="pointer" title="Click to sort"></i> Name</th>
                                <th class="pointer" title="Click to sort"></i> Password</th>
                                <th class="pointer" title="Click to sort"></i> Server</th>
                                <th class="pointer" title="Click to sort"> Profile</th>
                                <th class="pointer" title="Click to sort"></i> Mac Address</th>
                                <th class="text-right align-middle pointer" title="Click to sort"></i> Uptime</th>
                                <th class="text-right align-middle pointer" title="Click to sort"></i> Bytes In</th>
                                <th class="text-right align-middle pointer" title="Click to sort"></i> Bytes Out</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datasets as $data)
                            <tr>


                                @php

                                $uname = $data['name'];

                                @endphp
                                <td style='text-align:center;'>
                                    <i class='fa fa-minus-square text-danger pointer' onclick="if(confirm('Are you sure to delete user ({{$uname}})?')){loadpage('?remove-user={{$uname}}&server={{$uname}}')}else{}" title="Remove {{$uname}}">
                                    </i>
                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

                                    @php


                                    $serverId = $data['serverId'];

                                    if ($data['disabled'] == "true") {
                                    $uriprocess = "'?enable-user=" . $uname . "&server=".$serverId."'";
                                    echo '<span class="text-warning pointer" title="Enable User ' . $uname . '" onclick="loadpage(' . $uriprocess . ')"><i class="fa fa-lock "></i></span>
                                </td>';
                                } else {
                                $uriprocess = "'?disable-user=" . $uname . "&server=".$serverId."'";
                                echo '<span class="pointer" title="Disable User ' . $uname . '" onclick="loadpage(' . $uriprocess . ')"><i class="fa fa-unlock "></i></span></td>';
                                }

                                @endphp



                                <td><a title="Open User {{$data['name']}}" href="/client/view/{{$data['name']}}"><i class='fa fa-edit'></i> {{$data['name']}} </a>


                                <td>{{$data['clientName']}}</td>
                                <td>@isset($data['password']){{$data['password']}}@endisset</td>
                                <td>{{$data['serverName']}}</td>
                                <td>{{$data['profile']}}</td>
                                <td>@isset($data['mac-address']){{$data['mac-address']}}@endisset</td>
                                <td>{{$data['uptime']}}</td>
                                <td>{{$data['bytes-in']}}</td>
                                <td>{{$data['bytes-out']}}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div><!-- end row-->
</div> <!-- container -->





@endsection