@extends('layouts.app')
@section('title', 'Products')
@section('plugin-css')

@endsection
@section('plugin-js')
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Extras</a></li>
                                            <li class="breadcrumb-item active"> @yield('title')</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"> @yield('title')</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                <div class="card-header">
                                    
                                    <span class="float-right"><a href="add" title="Add Product"><i class="fa fa-plus-square"></i> Add Product</a></span>

                                </div>
                                    <div class="card-body">
                                       
            
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Code</th>
                                                        <th>Description</th>
                                                        <th>Category</th>
                                                        <th>Price</th>
                                                        <th>Quantity</th>
                                                        <th>Stock Date</th>
                                                        <th>Rating</th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($products as $product)
                                                    <tr>
                                                        <th scope="row">{{$product->id}}</th>
                                                        <td>{{$product->p_name}}</td>
                                                        <td>{{$product->p_code}}</td>
                                                        <td>{{$product->p_desc}}</td>
                                                        <td>{{$product->p_category}}</td>
                                                        <td>{{$product->p_price}}</td>
                                                        <td>{{$product->p_quantity}}</td>
                                                        <td>{{$product->p_stock_date}}</td>
                                                        <td>{{$product->p_rating}}</td>
                                                        <td><a href="/product/edit/{{$product->id}}">Edit</a></td>
                                                        <td><a href="/product/delete/{{$product->id}}">Delete</a></td>
                                                        
                                                    </tr>
                                                @endforeach
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div> <!-- end card -->
                            </div> <!-- end col -->
        
                           
                        </div>
                        <!-- end row --> 
                        
                    </div> <!-- container -->

                
@endsection