@extends('stakeholder.layouts.app')
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
                  <th>Due</th>
                  <th>Paid Amount</th>
                </tr>
              </thead>
              <tbody>
                 @foreach ($orders as $i=>$order)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $order->invoice_number }}</td>
                        <td>{{ date('Y-m-d', strtotime($order->created_at)) }}</td>
                        <td>{{ number_format($order->amount,2) }}</td>
                        <td>{{ $order->comission }} %</td>
                        <td>
                          @php
                            $percent = $order->amount * $order->comission /100;
                         @endphp
                           @if($order->given_amount == $percent)
                             0.00
                            @else
                              {{ number_format($percent,2) }}
                           @endif
                        </td>
                        <td>
                            {{ number_format($order->given_amount,2) }}
                        </td>
                        
                    </tr>
                 @endforeach
              </tbody>
              <tfoot>
                  <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>Total</td>
                      <td>
                          {{ number_format($total,2) }}
                      </td>
                  </tr>
              </tfoot>
            </table>
          </div>
       </div>
    </div>
@endsection