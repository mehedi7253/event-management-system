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
        <div class="table-responsive p-3">
            <table class="table align-items-center table-flush table-hover table-bordered" id="dataTableHover">
              <thead class="thead-light">
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>message</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($contact as $i=>$contacts)
                  <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $contacts->name }}</td>
                      <td>{{ $contacts->phone }}</td>
                      <td>{{ $contacts->email }}</td>
                      <td>
                          <?php echo $contacts->message ?>
                      </td>
                      <td>
                        <form action="{{ route('contact.destroy', $contacts->id) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete !!');"><i class="fa fa-trash"></i></button>
                      </form>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
       </div>
    </div>
@endsection