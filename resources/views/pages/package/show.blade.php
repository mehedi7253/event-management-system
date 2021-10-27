@extends('pages.layouts.app')
@section('content')
    <div class="col-md-12 col-sm-12 mt-5">
        @foreach ($package as $packages)
            <div class="card mt-5">
                <div class="card-body">
                    <div class="col-md-6 col-sm-12 float-left border-right">
                        <img src="{{ asset('package/images/'.$packages->image) }}" style="height: 300px; width: 100%" class="img-thumbnail">
                    </div>
                    <div class="col-md-6 col-sm-12 float-left">
                         <h3 class="text-capitalize text-center">{{ $packages->package_name }} Package <sup class="text-danger">{{ number_format($packages->price, 2) }} T.k</sup> </h3>
                         <hr/>
                         <form action="{{ route('pages.package.AddToCart') }}" method="POST">
                            @csrf
                            <div class="form-group mt-4">
                                <label class="font-weight-bold">Select Main Menu </label><br/>
                                <input name="package_id" value="{{ $packages->id }}" hidden>
                                @foreach($main_menu as $main_menus)
                                    <input type="checkbox" name="category_id[]"  value="{{ $main_menus->id }}"> {{ $main_menus->category_name }} <sup class="text-danger">{{ number_format($main_menus->price,2) }} T.K</sup> <br/>
                                @endforeach
                            </div>
                            <hr/>
                            <div class="form-group mt-4">
                                <label class="font-weight-bold">Select Sub Menu </label><br/>
                                @foreach($sub_menu as $sub_menus)
                                    <input type="checkbox" name="sub_category_id[]" value="{{ $sub_menus->id }}"> {{ $sub_menus->name }} <sup class="text-danger">{{ number_format($sub_menus->price,2) }} T.K</sup> <br/>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <input type="submit" name="btn" value="Submit" class="btn btn-success col-4">
                            </div>
                         </form>
                    </div>
                </div> 
            </div>
        @endforeach
    </div>

@endsection