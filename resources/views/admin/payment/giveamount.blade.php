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
           <form action="{{ route('stackeholder-payments.update', $assign_id->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Enter Amount</label>
                    @foreach ($payable_amount as $payamount)
                       @php
                           $payment = $payamount->amount * $assign_id->comission /100;
                       @endphp
                    <input type="number" name="total_amount" value="{{ $payamount->amount }}" hidden>
                    @endforeach
                    <input type="number" placeholder="Enter Amoutn" class="form-control" value="{{ $payment }}" disabled>
                    <input name="given_amount" value="{{ $payment }}" hidden>
                </div>
                <div class="form-group">
                    <input type="submit" name="btn"  class="btn btn-success" value="Pay Now">
                </div>
           </form>
       </div>
    </div>
@endsection