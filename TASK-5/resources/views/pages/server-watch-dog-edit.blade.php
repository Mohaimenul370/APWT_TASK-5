@extends('layouts.app')
@section('title', 'Watch Dogs')
@section('plugin-css')

@endsection
@section('plugin-js')
@endsection

@section('content')

				
<div class="container-fluid">

    <div class="row">

        <div class="col-lg-6">
            <div class="card-box">
               <div class="modal-content">
            
            <div class="modal-body p-4">
                <form action="{{route('watchdog.index')}}/edit/{{$server->id}}" method="post">
                @csrf   
                        <input type="hidden" name="id" value="{{$server->id}}"/>
                        <div class="form-group">
                        
                              <label for="name">Name</label>
                              <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required="" value="{{$server->name}}">
                        </div>
                        <div class="form-group">
                              <label for="companyId">Company ID</label>
                              <input type="text" class="form-control" id="companyId" name="companyId" value="{{$server->companyId}}">
                        </div>
                        <div class="form-group">
                              <label for="ip">IP</label>
                              <input type="text" class="form-control" id="ip" name="ip" value="{{$server->ip}}">
                        </div>


                        <div class="form-group">
                              <label for="port">Port</label>
                              <input type="number" class="form-control" id="port" name="port" value="{{$server->port}}">
                        </div>

                        <div class="form-group">
                              <label for="status">Status</label>
                              <input type="number" class="form-control" id="port" name="status" value="{{$server->status}}">
                        </div>

                        

                        <div class="form-group">
                              <label for="macAddress">Mac Address</label>
                              <input type="text" class="form-control" id="macAddress" name="macAddress" value="{{$server->macAddress}}">
                        </div>


                        <div class="form-group">
                              <label for="type">Type</label>
                              <select type="text" class="form-control" id="type" name="type" value="{{$server->type}}" required="">
                                    <option selected disabled>Select</option>
                                    <option value="By IP" {{$server->type== "1" ? 'selected' : ''}}>By IP</option>
                                    <option value="By MAC" {{$server->type== "2" ? 'selected' : ''}}>By MAC</option>
                              </select>
                        </div>


                        <div class="form-group">
                              <label for="isActive">Active</label>
                              <input type="number" class="form-control" id="isActive" name="isActive" value="{{$server->isActive}}">
                        </div>
                    
                                                    
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