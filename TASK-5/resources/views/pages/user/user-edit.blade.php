@extends('layouts.app')
@section('title', 'User Edit')
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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">User</a></li>
                        <li class="breadcrumb-item active">{{$data->name}}</li>
                    </ol>
                </div>
                <h4 class="page-title">User - {{$data->name}}</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->



    <div class="row">

        <div class="col-lg-6">
            <div class="card-box">
               <div class="modal-content">
            
            <div class="modal-body p-4">
            <form action="/admin/edit/{{$data->id}}" method="post">


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
                        <input type="text" class="form-control @error('phoneNo') is-invalid @enderror" id="phoneNo" name="phoneNo" value="{{$data->phoneNo}}" placeholder="Enter Phone No" required="">
                        @error('phoneNo')
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
        </div>
            </div> <!-- end card-box-->
        </div>
    </div>


    <!-- end row -->

</div>
    

                
@endsection