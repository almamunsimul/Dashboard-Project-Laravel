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
              <i class="fas fa-trash"></i>Recycle Bin
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
                <td><a href="{{$data->ban_url}}" target="_blank" class="btn btn-secondary">{{$data->ban_btn}}</td>
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
                      <li class="bg-success text-light"><button data-id="{{$data->ban_slug}}" class="dropdown-item restore-btn" data-bs-toggle="modal" data-bs-target="#restoreModal">Restore</button></li>
                      <li class="bg-danger text-light"><button data-id="{{$data->ban_slug}}" class="dropdown-item delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button></li>

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
        <div class="card-footer">
          <div class="btn-group" role="group" aria-label="Button group">
            <button type="button" class="btn btn-sm btn-dark">Print</button>
            <button type="button" class="btn btn-sm btn-secondary">PDF</button>
            <button type="button" class="btn btn-sm btn-dark">Excel</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




<!--Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Banner Permanently</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="{{route('banner.delete')}}">
        @csrf
          <div class="modal-body">
            <input type="hidden" name="modal_id" id="modal_input">
            Are You Sure Want To Delete Permanently?
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-danger">Delete</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          </div>
      </form>
    </div>
  </div>
</div>

<!--Restore Modal -->
<div class="modal fade" id="restoreModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Restore Banner</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="{{route('banner.restore')}}">
        @csrf
          <div class="modal-body">
            <input type="hidden" name="restore_id" id="restore_input">
            Are You Sure Want To Restore?
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-success">Restore</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          </div>
      </form>
    </div>
  </div>
</div>

@endsection