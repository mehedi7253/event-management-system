@extends('admin.layouts.app')
    @section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="./">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active" aria-current="page">{{ $page_name }}</li>
        </ol>
    </div>
 
      @if($message = Session::get('success'))
              <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">x</button>
              <strong>{{ $message }}</strong>
          </div>
      @endif
  

    <div class="card">
        <div class="card-header">
            <h6>{{ $page_name }}</h6>
        </div> 
       <div class="card-body">
           <div class="col-md-8 col-sm-12 float-left border-right"> 
            <form action="{{ route('assignstakeholders.update', $order->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Select Worker</label>
                    <select class="form-control" name="stackholder_id">
                        <option>------Select One-------</option>
                        @foreach ($stakeholders as $stakeholder)
                            <option value="{{ $stakeholder->id }}">{{ $stakeholder->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                     <label>Comission</label>
                     <input id="comission" type="number" min="1" class="form-control @error('comission') is-invalid @enderror" name="comission" value="{{ old('comission') }}" placeholder="Enter Commission" autocomplete="comission" autofocus>
                     @error('comission')
                     <span class="invalid-feedback" role="alert">
                         <label style="color: red">{{ $message }}</label>
                     </span>
                    @enderror
                 </div>
                 <div class="form-group col-md-6 col-sm-12 float-left">
                     <label></label>
                     <input type="submit" name="btn" class="btn btn-success btn-block" value="Submit">
                 </div>
            </form>
           </div>
           {{-- <div class="col-md-4 col-sm-12 float-left">
             <h3>Avilable Stakeholder</h3>
             <hr/>
             @if($order->process == '0')
                  @foreach ($stakeholders as $stakeholder)
                    <li> {{ $stakeholder->name }} <i class="fa fa-circle text-success" style="font-size: 10px"></i></li>
                  @endforeach
                @elseif($order->process == '1')
                @foreach ($deactive as $deactives)
                  <li> {{ $deactives->name }} <i class="fa fa-circle text-danger" style="font-size: 10px"></i></li>
                @endforeach
             @endif
           </div>  --}}
       </div>
    </div>
@endsection