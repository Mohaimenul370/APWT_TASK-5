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
                <h4 class="page-title">Company - {{$data->name}}</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->



    <div class="row">

        <div class="col-lg-6">
            <div class="card-box">
               <div class="modal-content">

            <div class="modal-body p-4">
            <form action="" method="post">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{$data->name}}" placeholder="Enter Company Name" required="">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="licenseNo">License No</label>
                    <input type="text" class="form-control @error('licenseNo') is-invalid @enderror" id="licenseNo" name="licenseNo" value="{{$data->licenseNo}}" placeholder="Enter License No" >
                    @error('licenseNo')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{$data->address}}" placeholder="Enter Address">
                    @error('address')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{$data->phone}}" placeholder="Enter Phone" required="">
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{$data->email}}" placeholder="Enter Email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>



                <div class="form-group">
                    <label for="fee">Fee</label>
                    <input type="number" id="fee" name="fee" class="form-control @error('fee') is-invalid @enderror" value="{{$data->fee}}" placeholder="Enter Fee" required="">
                    @error('fee')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>



                <div class="form-group">
                    <label for="due">Due</label>
                    <input type="number" class="form-control @error('due') is-invalid @enderror" id="due" name="due" value="{{$data->due}}" placeholder="Enter Due">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="balance">Balance</label>
                    <input type="text" class="form-control @error('balance') is-invalid @enderror" id="balance" name="balance" value="{{$data->balance}}" placeholder="Enter Balance">
                    @error('balance')
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
