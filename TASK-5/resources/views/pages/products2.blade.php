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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Retailer</a></li>
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
                            <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#custom-modal"><i class="mdi mdi-plus-circle mr-1"></i> Add Product</button>
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
                        @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                        @endif


                        @if($errors->any())
                        {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                        @endif

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
                                    <th>Code</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Stock Date</th>
                                    <th>Rating</th>
                                    <th style="width: 85px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach($products as $product)
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td class="table-user">

                                        <a href="/view/{{$product->id}}" target="watchdog" class="text-body font-weight-semibold">{{$product->p_name}}</a>
                                    </td>
                                    <td>{{$product->p_code}}</td>
                                    <td>{{$product->p_desc}}</td>
                                    <td>{{$product->p_category}}</td>
                                    <td>{{$product->p_price}}</td>
                                    <td>{{$product->p_quantity}}</td>
                                    <td>{{$product->p_stock_date}}</td>
                                    <td>{{$product->p_rating}}</td>

                                    <td>
                                        <a href="/edit/{{$product->id}}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                        <a href="/delete/{{$product->id}}" class="action-icon"> <i class="mdi mdi-delete"></i></a>
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
                <form action="{{route('product.add')}}" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required="">
                    </div>
                    <div class="form-group">
                        <label for="code">Code</label>
                        <input type="number" class="form-control" id="code" name="code" placeholder="Enter Code" required="">
                    </div>


                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Enter description" required="">
                    </div>






                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" id="category" name="category" required="">
                            <option value="Glosery">Glosery</option>
                            <option value="Mobile">Mobile</option>
                            <option value="Parts">Parts</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Enter price" required="">
                    </div>


                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity" required="">
                    </div>


                    <div class="form-group">
                        <label for="stock_date">Stock Date</label>
                        <input type="date" class="form-control" id="stock_date" name="stock_date" placeholder="Enter stock_date" required="">
                    </div>


                    <div class="form-group">
                        <label for="rating">Rating</label>
                        <input type="number" class="form-control" id="rating" name="rating" placeholder="Enter rating" required="">
                    </div>


                    <div class="form-group">
                        <label for="purchased">Purchased</label>
                        <input type="text" class="form-control" id="purchased" name="purchased" placeholder="Enter purchased" required="">
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