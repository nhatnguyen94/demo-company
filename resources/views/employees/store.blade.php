@extends('layout.master')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Create Employee</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    	@if ($errors->any())
                    	<div class="alert alert-danger">
                    		<ul>
                    			@foreach ($errors->all() as $error)
                    			<li>{{ $error }}</li>
                    			@endforeach
                    		</ul>
                    	</div>
                    	@endif
                    	<div class="card card-primary">
                    		<div class="card-header">
                    			<h3 class="card-title">Quick Example</h3>
                    		</div>
                    		<!-- /.card-header -->
                    		<!-- form start -->
                    		<form role="form" @if(isset($employee->id)) action="{{ route('employee.update', [ 'id' => $employee->id ]) }}"
                                      @else
                                      action="{{route('employee.store')}}"
                                      @endif method="post" enctype="multipart/form-data">
                    			@csrf
                    			<div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Company Name</label>
                                        <select class="form-control" name="company">
                                            @if($companies)
                                                @foreach($companies as $key => $value ) 
                                                <option value="{{$value->id}}" @if(isset($employee->company->id)) {{ $employee->company->id == $value->id   ? 'selected' : '' }}  @endif >{{$value->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>                                    
                    				<div class="form-group">
                    					<label for="exampleInputEmail1">First Name Employee</label>
                    					<input type="text" class="form-control" name="first_name" placeholder="Enter First Name" value="{{old('first_name',$employee->first_name ?? '')}}">
                    				</div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Last Name Employee</label>
                                        <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" value="{{old('last_name',$employee->last_name ?? '')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Phone Employee</label>
                                        <input type="text" name="phone" class="form-control" placeholder="Enter Phone" value="{{old('phone',$employee->phone ?? '')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter email" value="{{old('email',$employee->email ?? '')}}">
                                    </div>
                    			</div>
                    			<!-- /.card-body -->

                    			<div class="card-footer">
                    				<button type="submit" class="btn btn-primary">Submit</button>
                    			</div>
                    		</form>
                    	</div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>
@endsection