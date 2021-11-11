@extends('pages.layouts.app')
@section('content')
    <div class="col-md-10 mx-auto mt-5">
        <div class="card mt-5 mb-5">
            <div class="card-header">
                <h3 class="text-center">{{ $page_name }}</h3>
            </div>
            @if($message = Session::get('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <div class="card-body">
                <form action="{{ route('contact-us.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Your Name: <sup class="text-danger">*</sup></label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Your Name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Your Email: <sup class="text-danger">*</sup></label>
                        <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Your Email">
                        
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label>Your Phone: <sup class="text-danger">*</sup></label>
                        <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Enter Your Phone">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label>Message: <sup class="text-danger">*</sup></label>
                       <textarea class="form-control" name="message" id="application" placeholder="Enter Your Message"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="btn" class="btn btn-success" value="Send Message">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection