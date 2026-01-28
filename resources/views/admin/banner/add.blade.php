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

      @if(session('error'))
      <div class="alert alert-danger">
        {{session('error')}}
      </div>
      @endif

      <form method="POST" action="{{ route('banner.insert') }}" enctype="multipart/form-data">
        @csrf
        <div class="card mb-3">
          <div class="card-header">
            <div class="row">
              <div class="col-md-8 card_title_part">
                <i class="fab fa-gg-circle"></i>Banner Registration
              </div>
              <div class="col-md-4 card_button_part">
                <a href="{{route('banner.all')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All banner</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Banner Title<span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="title">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Banner SubTitle</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="subtitle">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Banner Button<span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="button">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Banner URL/WEB Link<span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="url">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Banner Image:</label>
              <div class="col-sm-4">
                <input type="file" class="form-control form_control" id="" name="image">
              </div>
            </div>
          </div>
          <div class="card-footer text-center">
            <button type="submit" class="btn btn-sm btn-dark">REGISTRATION</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection