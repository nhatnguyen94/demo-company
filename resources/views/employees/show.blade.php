@extends('layout.master')
@section('content')
        <div class="row">
          <div class="col-md-12">


            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Employee</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> First Name</strong>

                <p class="text-muted">
                  {{$employee->first_name}}
                </p>

                <hr>

                <strong><i class="fas fa-book mr-1"></i> Last Name</strong>

                <p class="text-muted">
                  {{$employee->last_name}}
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Phone</strong>

                <p class="text-muted">{{$employee->phone}}</p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Email</strong>

                <p class="text-muted">{{$employee->email}}</p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Company Name</strong>

                <p class="text-muted">{{$employee->company->name}}</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <!-- /.col -->
        </div>
@endsection