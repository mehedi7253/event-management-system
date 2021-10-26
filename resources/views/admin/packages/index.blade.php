@extends('admin.layouts.app')
    @section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="./">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active" aria-current="page">{{ $page_name }}</li>
        </ol>
    </div>



    <h6>
      @if($message = Session::get('success'))
              <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">x</button>
              <strong>{{ $message }}</strong>
          </div>
      @endif
  </h6>
    <div class="card">
        <div class="card-header">
            <h6>{{ $page_name }} <a href="{{ route('packages.create') }}" class="float-right btn btn-info">Add New pacakges</a></h6>
        </div> 
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush table-hover table-bordered" id="dataTableHover">
            <thead class="thead-light">
              <tr>
                <th>Package Name</th>
                <th>Price</th>
                <th>Status</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($packages as $package)
                <tr>
                    <td>{{ $package->package_name }}</td>
                    <td>{{ number_format($package->price,2)  }}</td>
                    <td>
                       @if($package->status == '0')
                        <span class="label text-success">Published</span>
                      @else
                          <span class="label text-danger">Un-Published</span>
                      @endif
                   </td>
                   <td>
                     <img src="{{ asset('package/images/'.$package->image) }}" class="img-thumbnail" style="height: 50px; width: 100px">
                   </td>
                    <td>
                      <form action="{{ route('packages.destroy', $package->id) }}" method="post">
                        <a href="{{ route('packages.edit', $package->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a> |
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete !!');"><i class="fa fa-trash"></i></button>
                    </form>
                      
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
    </div>

    @section('script')
    
    @endsection

@endsection