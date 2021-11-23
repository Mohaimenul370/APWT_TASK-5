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
                        <li class="breadcrumb-item active">Products View</li>
                    </ol>
                </div>
                <h4 class="page-title">Products View</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->



    <div class="row">

        <div class="col-lg-6">
            <div class="card-box">
               <div class="modal-content">
            
            <div class="modal-body p-4">
                <form action="{{ route('product.edit')}}" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required="" value="{{$product->p_name}}">
                    </div>
                    <div class="form-group">
                        <label for="code">Code</label>
                        <input type="number" class="form-control" id="code" name="code" placeholder="Enter Code" required="" value="{{$product->p_code}}">
                    </div>


                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Enter description" required="" value="{{$product->p_desc}}">
                    </div>






                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" id="category" name="category" required="">
                            <option value="{{$product->p_category}}">{{$product->p_category}}</option>
                            <option value="Glosery">Glosery</option>
                            <option value="Mobile">Mobile</option>
                            <option value="Parts">Parts</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Enter price" required="" value="{{$product->p_price}}">
                    </div>


                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity" required="" value="{{$product->p_quantity}}">
                    </div>


                    <div class="form-group">
                        <label for="stock_date">Stock Date</label>
                        <input type="date" class="form-control" id="stock_date" name="stock_date" placeholder="Enter stock_date" required="" value="{{$product->p_stock_date}}">
                    </div>


                    <div class="form-group">
                        <label for="rating">Rating</label>
                        <input type="number" class="form-control" id="rating" name="rating" placeholder="Enter rating" required="" value="{{$product->p_rating}}">
                    </div>


                    <div class="form-group">
                        <label for="purchased">Purchased</label>
                        <input type="text" class="form-control" id="purchased" name="purchased" placeholder="Enter purchased" required="">
                    </div>
                    

                    <input type="hidden" name="id" value="{{$product->id}}"/>













                    @csrf                    <div class="text-right">
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