@extends('layouts.admin')

@section('content')
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        @if (session('message'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="card-header d-flex flex-row justify-content-between align-items-center p-3">
          <h2 class="m-0">All Catagories</h2>
          <a class="btn btn-primary text-white float-right" href="{{ url('admin/catagory/create') }}">Add Catagory</a>
        </div>
        <div class="card-body">
          {{ $caragories }}
          @if (!$caragories->isEmpty())
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($caragories as $catagory)
                <tr>
                  <td class="py-1"><img src="{{ asset('upload/catagory/'.$catagory->image)}}" alt="image"></td>
                  <td>{{ $catagory->name }}</td>
                  <td>{{ $catagory->description }}</td>
                  <td>
                    @if($catagory->status == '0')
                    Visible
                    @else
                    Hide
                    @endif
                  </td>
                  <td>
                    <a href="{{ url('admin/catagory', $catagory->id) }}" onclick="return confirm('Are You want to Sure?')" class="btn btn-danger">Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          @else
            <div class="text-center">No Data Found !!</div>
          @endif
          <div class="d-flex justify-content-center mt-3">
            {{ $caragories->links('pagination::bootstrap-4') }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
