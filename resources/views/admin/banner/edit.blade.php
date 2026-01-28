@extends('layouts.admin')


@section('content')
<div class="col-md-10 content">
  <div class="row">
    <div class="col-md-12 breadcumb_part">
      <div class="bread">
        <ul>
          <li><a href=""><i class="fas fa-home"></i>Home</a></li>
          <li><a href=""><i class="fas fa-angle-double-right"></i>Dashboard</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 ">
      <form method="POST" action="{{route('banner.update')}}" enctype="multipart/form-data">
        @csrf
        <div class="card mb-3">
          <div class="card-header">
            <div class="row">
              <div class="col-md-8 card_title_part">
                <i class="fab fa-gg-circle"></i>Update Banner Information
              </div>
              <div class="col-md-4 card_button_part">
                <a href="{{route('banner.all')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Banner</a>
              </div>
            </div>
          </div>
          <div class="card-body">

          <!-- ban id transfer for Update data. -->
            <input type="hidden" value="{{$data->ban_slug}}" name="ban_slug">
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Banner Title<span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" value="{{$data->ban_title}}" name="title">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Banner SubTitle</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" value="{{$data->ban_subtitle}}" name="subtitle">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Banner Button<span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" value="{{$data->ban_btn}}" name="button">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Banner URL/WEB Link<span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" value="{{$data->ban_url}}" name="url">
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Banner Image</label>
              <div class="col-sm-4">
                <input type="file" class="form-control form_control" id="" value="{{$data->ban_image}}" name="image">
              </div>              
              <div class="col-sm-4">
                  @if(!empty($data->ban_image))
                  <img width="100" src="{{asset('uploads/banner')}}/{{$data->ban_image}}" class="img-fluid" alt="">
                  @else
                  <img width="100" src="{{asset('uploads/default')}}/default.png" class="img-fluid" alt="">
                  @endif
              </div>

            </div>
          </div>
          <div class="card-footer text-center">
            <button type="submit" class="btn btn-sm btn-dark">UPDATE</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection