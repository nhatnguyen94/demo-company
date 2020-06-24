@extends('layout.master')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Companies</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Website</th>
                                    <th>Logo</th>
                                    <th>Control</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@if($data)
                            	 @foreach($data as $key => $item)
                                <tr>
	                                <td>{{$key +1 }}</td>
	                                <td>{{$item->name}}</td>
	                                <td>{{$item->email}}</td>
                                    <td>{{$item->website}}</td>
	                                <td><img src="/{{$item->logo}}" width="50" height="50"></td>
                                  <td class="project-actions text-center">
                                      <a class="btn btn-primary btn-sm" href="{{route('company.show',['id'=> $item->id])}}">
                                          <i class="fas fa-folder">
                                          </i>
                                          View
                                      </a>
                                      <a class="btn btn-info btn-sm" href="{{route('company.edit',['id'=> $item->id])}}">
                                          <i class="fas fa-pencil-alt">
                                          </i>
                                          Edit
                                      </a>
                                      <form action="{{route('company.delete',['id'=> $item->id])}}" method="POST">
                                       @method('DELETE')
                                       @csrf
                                       <button type="submit" class="btn btn-danger btn-sm" href="">
                                          <i class="fas fa-trash">
                                          </i>
                                          Delete
                                      </button>           
                                  </form>

                                  </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="5">Không có dữ liệu</td>
                                </tr>
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>STT</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Website</th>
                                    <th>Logo</th>
                                    <th>Control</th>
                                </tr>
                            </tfoot>
                        </table>
                        {{ $data->links() }}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>
@endsection