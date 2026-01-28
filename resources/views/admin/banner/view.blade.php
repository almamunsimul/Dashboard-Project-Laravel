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
    <div class="col-md-12">
      <div class="card mb-3">
        <div class="card-header">
          <div class="row">
            <div class="col-md-8 card_title_part">
              <i class="fab fa-gg-circle"></i>View Banner Information
            </div>
            <div class="col-md-4 card_button_part">
              <a href="{{route('banner.all')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Banner</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <table class="table table-bordered table-striped table-hover custom_view_table">
                <tr>
                  <td>Banner Title</td>
                  <td>:</td>
                  <td>{{$data->ban_title}}</td>
                </tr>
                <tr>
                  <td>Banner SubTitle</td>
                  <td>:</td>
                  <td>{{$data->ban_subtitle}}</td>
                </tr>
                <tr>
                  <td>Banner Button</td>
                  <td>:</td>
                  <td>{{$data->ban_btn}}</td>
                </tr>
                
                <tr>
                  <td>Banner URL</td>
                  <td>:</td>
                  <td>{{$data->ban_url}}</td>
                </tr>                
                <tr>
                  <td>Banner Creator</td>
                  <td>:</td>
                  <td>{{$data->CreatorInfo->name}}</td>
                </tr>                
                <tr>
                  <td>Banner Editor</td>
                  <td>:</td>
                  <td>
                    @if (!empty ($data->EditorInfo->name))
                      {{$data->EditorInfo->name}}
                    @else
                      Not Edited Yet
                    @endif
                  </td>
                </tr>
                <tr>
                  <td>Created At</td>
                  <td>:</td>
                  <td>{{$data->created_at->diffForHumans()}}</td>
                </tr>
                <tr>
                  <td>Banner Image</td>
                  <td>:</td>
                  <td>
                  @if(!empty($data->ban_image))
                  <img width="300" src="{{asset('uploads/banner')}}/{{$data->ban_image}}" class="img-fluid" alt="">
                  @else
                  <img width="300" src="{{asset('uploads/default')}}/default.png" class="img-fluid" alt="">
                  @endif

                  </td>
                </tr>
              </table>
            </div>
            <div class="col-md-2"></div>
          </div>
        </div>
        <div class="card-footer">
          <div class="btn-group" role="group" aria-label="Button group">
            <button type="button" class="btn btn-sm btn-dark">Print</button>
            <a type="button" href="{{route('banner.printi', $data->ban_slug)}}" class="btn btn-sm btn-secondary">PDF</a>
            <a type="button" class="btn btn-sm btn-dark">Excel</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection