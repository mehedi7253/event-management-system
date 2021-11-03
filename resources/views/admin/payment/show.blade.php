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
            <h6>{{ $page_name }}</h6>
        </div> 
       <div class="card-body">
        <div class="table-responsive p-3">
            <table class="table align-items-center table-flush table-hover table-bordered" id="dataTableHover">
              <thead class="thead-light">
                <tr>
                  <th>#</th>
                  <th>Order Invoice</th>
                  <th>Order Date</th>
                  <th>Total Amount</th>
                  <th>Percent</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                 {{-- @foreach ($orders as $i=>$order)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $order->name }}</td>
                        <td>
                            @php
                                $totalorder = DB::table('assignstackholders')->where('stackholder_id','=', $order->stackholder_id)->where('process','=','1')->count();
                                echo $totalorder;
                            @endphp
                        </td>
                        <td>
                            <a class="btn btn-info" href="{{ route('stackeholder-payments.show', $order->id) }}"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                 @endforeach --}}
              </tbody>
            </table>
          </div>
       </div>
    </div>
@endsection