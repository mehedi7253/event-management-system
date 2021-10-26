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
            <h6>{{ $page_name }} <a href="{{ route('categorys.create') }}" class="float-right btn btn-info">Add New Category</a></h6>
        </div> 
       <div class="card-body">
        <div class="table-responsive p-3">
            <table class="table align-items-center table-flush table-hover table-bordered" id="dataTableHover">
              <thead class="thead-light">
                <tr>
                  <th>#</th>
                  <th>Package Name</th>
                  <th>Category Name</th>
                  <th>Sub Category</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($category as $i=>$categorys)
                  <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $categorys->packages->package_name }}</td>
                      <td>{{ $categorys->category_name }}</td>
                    
                      <td>
                          {{-- <a href="" class="btn btn-primary"><i class="fa fa-eye"></i></a> --}}
                          <a href="{{ route('sub-categorys.edit',  $categorys->id) }}" class="btn btn-info"><i class="fa fa-plus"></i></a>
                      </td>
                      <td>
                        <form action="{{ route('categorys.destroy', $categorys->id) }}" method="post">
                          <a href="{{ route('categorys.edit', $categorys->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a> |
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
    </div>
@endsection