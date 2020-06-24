@extends('layout.master')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Create Companies</h3>
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
                    		<form role="form" @if(isset($company->id)) action="{{ route('company.update', [ 'id' => $company->id ]) }}"
                                      @else
                                      action="{{route('company.store')}}"
                                      @endif method="post" enctype="multipart/form-data">
                    			@csrf
                    			<div class="card-body">
                    				<div class="form-group">
                    					<label for="exampleInputEmail1">Name Company</label>
                    					<input type="text" class="form-control" name="name" placeholder="Enter Company" value="{{old('name',$company->name ?? '')}}">
                    				</div>
                    				<div class="form-group">
                    					<label for="exampleInputEmail1">Email address</label>
                    					<input type="email" name="email" class="form-control" placeholder="Enter email" value="{{old('email',$company->email ?? '')}}">
                    				</div>
                    				<div class="form-group">
                    					<label for="exampleInputEmail1">Website Company</label>
                    					<input type="text" name="website" class="form-control" placeholder="Enter Website" value="{{old('website',$company->website ?? '')}}">
                    				</div>
                    				<div class="form-group">
                    					<label for="exampleInputFile">File input</label>
                    					<div class="input-group">
                    						<div class="custom-file">
                    							<input type="file" class="custom-file-input" name="logo" value="{{old('logo',$company->logo ?? '')}}">
                    							<label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    						</div>
                    						<div class="input-group-append">
                    							<span class="input-group-text" id="">Upload</span>
                    						</div>
                    					</div>
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