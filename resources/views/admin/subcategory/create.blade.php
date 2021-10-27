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
            <h6>{{ $page_name }} <a href="{{ route('categorys.index') }}" class="float-right btn btn-info">Manage Category</a></h6>
        </div> 
       <div class="card-body">
            <div class="col-md-4 col-sm-12 float-left border-right">
                <form action="{{ route('sub-categorys.update', $categories->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Sub Category Name <sup class="font-weight-bold text-danger">*</sup></label>
                        <input name="package_id" value="{{ $categories->package_id }}" hidden>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter Sub Category Name" autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                             <label style="color: red">{{ $message }}</label>
                         </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Price <sup class="font-weight-bold text-danger">*</sup></label>
                        <input id="price" type="number" min="1" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" placeholder="Enter Category Price" autocomplete="price" autofocus>
                        @error('price')
                        <span class="invalid-feedback" role="alert">
                             <label style="color: red">{{ $message }}</label>
                         </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label></label>
                        <input type="submit" name="submit" class="btn btn-success" value="Submit">
                    </div>
                   </form>
            </div>

            <div class="col-md-8 col-sm-12 float-left">
                <h3>Sub Category List</h3>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sub_categorie as $i=>$sub_categories)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $sub_categories->name }}</td>
                                <td>{{ number_format($sub_categories->price,2) }}</td>
                                <td>
                                    <form action="{{ route('sub-categorys.destroy', $sub_categories->id) }}" method="post">
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
    </div>
@endsection