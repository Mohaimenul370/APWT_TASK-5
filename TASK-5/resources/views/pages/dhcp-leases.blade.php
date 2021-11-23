@extends('layouts.app')
@section('title', 'DHCP Leases')
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
                                <th></th>
                                <th class="pointer" title="Click to sort">Server</th>
                                <th class="pointer" title="Click to sort">DHCP Server</th>
                                <th class="pointer" title="Click to sort">Active Address</th>
                                <th class="pointer" title="Click to sort">Active MAC Address</th>
                                <th class="pointer" title="Click to sort">Active Host Name</th>
                                <th class="pointer" title="Click to sort">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datasets as $data)
                            <tr>
                                @php

                                echo "<td style='text-align:center;'>";
                                    if ($data['dynamic'] == "true") {
                                    echo "<b title='D - dynamic'>D</b>";
                                    } else {
                                    echo "<b title='S - static'>S</b>";
                                    }
                                    echo "</td>";
                                @endphp

                                <td>{{$data['serverName']}}</td>
                                <td>{{$data['server']}}</td>
                                <td>{{$data['active-address']}}</td>
                                <td>{{$data['active-mac-address']}}</td>
                                <td>@isset($data['host-name']){{$data['host-name']}}@endisset</td>
                                <td>{{$data['status']}}</td>
                                @endforeach
                        </tbody>
                    </table>


                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div><!-- end row-->
</div> <!-- container -->





@endsection