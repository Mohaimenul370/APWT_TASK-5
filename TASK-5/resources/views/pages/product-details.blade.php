@extends('layouts.app')
@section('title', 'Products')
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
                    <img class="d-flex mr-3 rounded-circle avatar-lg" src="assets/images/users/avatar.png" alt="Generic placeholder image">
                    <div class="media-body">
                        <h4 class="mt-0 mb-1">{{$product->p_name}}</h4>
                        <p class="text-muted">{{$product->p_code}}</p>

                        <p class="text-muted">{{$product->p_category}}</p>


                        
                        <p class="text-muted"><i class="mdi mdi-office-building"></i> {{$product->p_desc}}</p>

                       
                    </div>
                </div>

               

                <form method="post" action="app/Controller/RenewPPPoEController.php" enctype="multipart/form-data">
                    <div class="">
                        <h4 class="font-13 text-muted text-uppercase">Price :</h4>
                        <p class="mb-3">
                        {{$product->p_price}} </p>

                        <h4 class="font-13 text-muted text-uppercase mb-1">Quantity :</h4>
                        <p class="mb-3"> {{$product->p_quantity}}</p>


                        <h4 class="font-13 text-muted text-uppercase mb-1">Stock Date :</h4>
                        <p class="mb-3"> {{$product->p_stock_date}}</p>

                        <h4 class="font-13 text-muted text-uppercase mb-1">Rating :</h4>
                        <p class="mb-0"> {{$product->p_rating}}</p>

                        <h4 class="font-13 text-muted text-uppercase mb-1">Purchased :</h4>
                        <p class="mb-0">Yes</p>







                       

                        <input type="hidden" value="{{$product->id}}" name="id" id="id">
                    
                        @csrf


                    </div>
                </form>


            </div> <!-- end card-box-->
        </div>
    </div>


    <!-- end row -->

</div>


@endsection