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
            <h6>{{ $page_name }} </h6>
        </div> 
       <div class="card-body">
            <div class="table-responsive">
                <table class="table-bordered table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($msg_list as $i=>$msgs)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $msgs->UserName }}</td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('admin-chat.show', $msgs->UserID) }}">Chat Now</a>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
       </div>
    </div>
@endsection