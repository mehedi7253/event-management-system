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
    <div class="card mb-5">
        <div class="card-header">
            <h6>{{ $page_name }} </h6>
        </div> 
       <div class="card-body">
        <div class="table-responsive p-3">
            <table class="table align-items-center table-flush table-hover table-bordered" id="dataTableHover">
              <thead class="thead-light">
                  <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Invoice </th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($orders as $i=>$order)
                      <tr>
                          <td>{{ ++$i }}</td>
                          <td>{{ $order->name }}</td>
                          <td>{{ $order->phone }}</td>
                          <td>{{ $order->invoice_number }}</td>
                          <td>
                              @if($order->process == '0')
                                  <label class="text-danger">Pending</label>
                                @elseif($order->process == '1')
                                  <label class="text-info">Rechived</label>
                                @elseif($order->process == '2')
                                  <label class="text-info">Assigned</label>
                                @elseif($order->process == '3')
                                  <label class="text-success">Complete</label>
                                @else
                                 <label class="text-danger">Failed</label>
                              @endif
                          </td>
                          <td>
                              @if($order->process == '1')
                                 <a href="{{ route('assignstakeholders.edit', $order->id) }}" class="btn btn-info"><i class="fa fa-plus"></i></a>
                                @elseif ($order->process == '2')
                                <a class="btn btn-info"><i class="fa fa-plus"></i></a>
                              @endif
                              <a href="{{ route('neworders.show', $order->id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                          </td>
                      </tr>
                  @endforeach
              </tbody>
            </table>
        </div>
       </div>
    </div>
@endsection