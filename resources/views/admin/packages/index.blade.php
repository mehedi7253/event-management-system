@extends('admin.layouts.app')
    @section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="./">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active" aria-current="page">{{ $page_name }}</li>
        </ol>
    </div>




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
                    <td>{{ $package->price  }}</td>
                    <td>{{ $package->status }}</td>
                    <td>{{ $package->image }}</td>
            
                    <td>
                        <a href="#" class="btn btn-info"><i class="fa fa-edit"></i></a>
                        <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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