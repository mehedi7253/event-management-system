@extends('admin.layouts.app')
    @section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="./">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active" aria-current="page">{{ $page_name }}</li>
        </ol>
    </div>
      
    <div class="card mb-5">
        <div class="card-header">
            <h6>{{ $page_name }} </h6>
        </div> 
       <div class="card-body">
        <form action="{{ route('reports.search') }}" method="get" role="search">
            <div class="form-group ml-3">
                <label>Select Month: <sup class="text-danger">*</sup></label>
            </div>
            <div class="form-group input-group col-md-6 col-sm-12">
                <select class="form-control" name="search">
                    <option>---------Select Month---------</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">Agust</option>
                    <option value="9">September</option>
                    <option value="10">Octabor</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                <button type="submit" id="search" class="btn btn-primary"><i class="fas fa-search"></i> Search</button>
            </div>
        </form>
       
        @if(isset($data) == true)
            @if($data->count())
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover table-bordered" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Invoice </th>
                            <th>Amount</th>
                            <th>Order Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $i=>$order)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $order->invoice_number }}</td>
                                <td>{{ number_format($order->amount,2) }}</td>
                                <td>{{ date('m-d-Y', strtotime($order->created_at)) }}</td>   
                                <td>
                                    <a class="btn btn-info" href=""><i class="fa fa-eye"></i></a>
                                </td>                      
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td>Total</td>
                            <td>
                               {{ number_format($total,2) }}
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tfoot>
                    </table>
                </div>
            @else
                <div class="alert alert-danger">Data Not Found...!</div>
            @endif        
        @endif
      
    </div>
@endsection