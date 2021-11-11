@extends('user.layouts.app')
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
            <h6>{{ $page_name }} </h6>
        </div> 
       <div class="card-body">
        <div class="col-md-5 col-sm-12 float-left">
            <img src="{{ asset('user/images/'.Auth::user()->image) }}" style="height: 245px; width: 100%">
        </div>
        <div class="col-md-7 col-sm-12 float-left">
            <table class="table-bordered table">
                <tr>
                    <th> Name</th>
                    <td>{{ Auth::user()->name }}</td>
                </tr>
                <tr>
                     <th>Email</th>
                     <td>{{ Auth::user()->email }}</td>
                 </tr>
               
                 <tr>
                     <th>Address</th>
                     <td>
                        {{ Auth::user()->address }}
                     </td>
                 </tr>
                 <tr>
                    <th>Gender</th>
                    <td>
                       {{ Auth::user()->gender }}
                    </td>
                </tr>
                <tr>
                    <th>Join Date</th>
                    <td>
                       {{ date('d-M-Y', strtotime(Auth::user()->created_at))  }}
                    </td>
                </tr>
            </table>
        </div>
       </div>
    </div>
@endsection