@extends('layout.master')
@section('content')
        <div class="row">
          <div class="col-md-12">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="/{{$company->logo}}"
                       alt="User profile picture">
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Company</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Website</strong>

                <p class="text-muted">
                  {{$company->website}}
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Name</strong>

                <p class="text-muted">{{$company->name}}</p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Email</strong>

                <p class="text-muted">{{$company->email}}</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <!-- /.col -->
        </div>
@endsection