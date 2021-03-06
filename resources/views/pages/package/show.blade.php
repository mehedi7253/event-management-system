@extends('pages.layouts.app')
@section('content')
    <div class="col-md-12 col-sm-12 mt-5">
        @foreach ($package as $packages)
            <div class="card mt-5">
                <div class="card-header">
                    <h3 class="text-capitalize">{{ $packages->package_name }} Package <span class="float-right"> {{ $ratings->count() }} People Rate It</span></h3>
                </div>
                <div class="card-body">
                    {{-- <div class="col-md-4 col-sm-12 float-left border-right">
                        <img src="{{ asset('package/images/'.$packages->image) }}" style="height: 300px; width: 100%" class="img-thumbnail">
                    </div> --}}
                    @foreach($main_menu as $main_menus)
                        <div class="col-md-4 col-sm-12 float-left mb-2">
                            <div class="card">
                                <div class="card-header">
                                    <h3>{{ $main_menus->category_name }} <sup>{{ number_format($main_menus->category_price,2) }} T.K</sup></h3>
                                
                                    <p class="text-capitalize">You Will Get:</p>
                                    <p>
                                        <?php echo $main_menus->description; ?>
                                    </p>
                                </div>
                                    <form action="{{ route('pages.package.AddToCart') }}" method="POST">
                                        @csrf
                                    <div class="card-body">
                                        <input name="package_id" value="{{ $packages->id }}" hidden>
                                        <input name="category_id" value="{{ $main_menus->id }}" hidden>
                                        @php($submenu = DB::select(DB::raw("SELECT * FROM subcategories WHERE category_id = $main_menus->id")))
                                        @foreach($submenu as $sub_menus)
                                        <input type="checkbox" name="sub_category_id[]" value="{{ $sub_menus->id }}"> {{ $sub_menus->name }} <sup class="text-danger"> {{ number_format($sub_menus->price,2) }}T.K</sup> <br/>
                                        @endforeach
                                    </div>
                                    <div class="card-footer">
                                        <input type="submit" name="btn" value="Submit" class="btn btn-success col-4">
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div> 
            </div>
        @endforeach
    </div>

    <div class="col-md-12 col-sm-12 mb-5">
        <div class="card">
            <div class="card-body">
                @foreach ($ratings as $rating)
                    <div class="form-group input-group" style="border: 1px solid silver; padding:10px">
                        <div class="input-group-prepend">
                            <img src="{{ asset('user/images/'.$rating->image) }}" style="height: 30px; width: 30px; border-radius: 50%;"> <span class="ml-2 text-info text-capitalize">{{ $rating->UserName }} <span class="text-dark">Give {{ $rating->Rting }} </span> <i class="fa fa-star" style="color: black"></i></span>
                        </div>
                        <p class="font-weight-bold form-control" disabled style="height: auto; border-radius: 16px; margin-left: -100px; margin-top: 32px"><?php echo $rating->description ?></textarea>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection