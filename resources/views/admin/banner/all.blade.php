@extends('layouts.admin')


@section('content')
<div class="col-md-10 content">
  <div class="row">
    <div class="col-md-12 breadcumb_part">
      <div class="bread">
        <ul>
          <li><a href="{{route('dashboard')}}"><i class="fas fa-home"></i>Home</a></li>
          <li><a href="{{route('dashboard')}}"><i class="fas fa-angle-double-right"></i>Dashboard</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      @if(session('success'))
      <div class="alert alert-success">
        {{session('success')}}
      </div>
      @endif
      <div class="card mb-3">
        <div class="card-header">
          <div class="row">
            <div class="col-md-8 card_title_part">
              <i class="fab fa-gg-circle"></i>All Banner Information
            </div>
            <div class="col-md-4 card_button_part">
              <a href="{{route('banner.add')}}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add Banner</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped table-hover custom_table">
            <thead class="table-dark">
              <tr>
                <th>Banner Title</th>
                <th>Banner SubTitle</th>
                <th>Banner Button</th>
                <th>Banner Image</th>
                <th>Created At</th>
                <th>Manage</th>
              </tr>
            </thead>
            <tbody>

              @forelse($bandata as $data)
              <tr>
                <td>{{Str::limit($data->ban_title,30)}}</td>
                <td>{{Str::limit($data->ban_subtitle,50)}}</td>
                <td><a href="{{$data->ban_url}}" target="_blank" class="btn btn-secondary">{{$data->ban_btn}}</a></td>
                <td>
                  @if(!empty($data->ban_image))
                  <img width="100" src="{{asset('uploads/banner')}}/{{$data->ban_image}}" class="img-fluid" alt="">
                  @else
                  <img width="100" src="{{asset('uploads/default')}}/default.png" class="img-fluid" alt="">
                  @endif

                </td>
                <td>{{$data->created_at->diffForHumans()}}</td>
                <td>
                  <div class="btn-group btn_group_manage" role="group">
                    <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{route('banner.view',$data->ban_slug)}}">View</a></li>
                      <li><a class="dropdown-item" href="{{route('banner.edit',$data->ban_slug)}}">Edit</a></li>
                      @if(Auth::user()->role_id==1)
                      <li class="bg-danger text-light"><button data-id="{{$data->ban_slug}}" class="dropdown-item delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button></li>
                      @endif
                      <!-- Delete Data Directly -->
                       {{-- <form action="{{ route('banner.delete', $data->ban_slug) }}" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete?')">
                            @csrf
                              <button type="submit" class="btn btn-danger btn-sm dropdown-item">
                                  Delete
                              </button>
                      </form> --}}

                    </ul>
                  </div>
                </td>
              </tr>

              @empty
              <tr>
                <td>No Banner Found</td>
                <td>--</td>
                <td>--</td>
                <td>--</td>
                <td>--</td>
                <td>--</td>

              </tr>
              @endforelse


            </tbody>
          </table>
        </div>
        <div class="card-footer d-flex justify-content-between">
          <div class="btn-group" role="group" aria-label="Button group">
            <button type="button" class="btn btn-sm btn-dark">Print</button>
            <a type="button" href="{{route('banner.print')}}" class="btn btn-sm btn-secondary">PDF</a>
            <a type="button" href="{{route('banner.excel')}}" class="btn btn-sm btn-dark">Excel</a>
          </div>
          <div class="btn-group" role="group" aria-label="Button group">
            <form method="POST" action="{{ route('banner.excelUpload') }}" enctype="multipart/form-data">
              @csrf
              <div class="d-flex">
                <input type="file" name="bannerExcel" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <button type="submit" class="btn btn-success mx-3">Uploads</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Banner</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="{{route('banner.softdelete')}}">
        @csrf
          <div class="modal-body">
            <input type="text" name="modal_id" id="modal_input">
            Are You Sure Want To Delete?
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-danger">Delete</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          </div>
      </form>
    </div>
  </div>
</div>

@endsection