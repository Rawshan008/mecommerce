@extends('layouts.admin')

@section('content')
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
        <div class="card-header d-flex flex-row justify-content-between align-items-center p-3">
          <h2 class="m-0">Add Catagory</h2>
          <a class="btn btn-primary text-white float-right" href="{{ url('admin/catagory') }}">All Catagory</a>
        </div>
        <div class="card-body">
          <form class="forms-sample" method="POST" action="{{ url('admin/catagory') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="exampleInputName1">Name</label>
              <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name">
            </div>
            
            <div class="form-group">
              <label>Image</label>
              <input name="image" class="form-control" type="file">
            </div>

            <div class="form-group">
              <label for="exampleTextarea1">Textarea</label>
              <textarea name="description" class="form-control" id="exampleTextarea1" rows="4"></textarea>
            </div>

            <div class="form-group">
              <div class="form-check form-check-primary">
                <label class="form-check-label">
                  <input name="status" type="checkbox" class="form-check-input" checked="">
                  Visible?
                <i class="input-helper"></i></label>
              </div>
            </div>

            <button type="submit" class="btn btn-primary me-2">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection