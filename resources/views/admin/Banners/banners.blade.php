@extends('admin.layouts.master')
@section('title','View Banners')
@section('content')
    <!-- =============================================== -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="fa fa-eye"></i>
            </div>
            <div class="header-title">
                <h1>View Banners</h1>
                <small>Categories List</small>
            </div>
        </section>
        <div id="message_success" style="display:none;" class="alert alert-sm alert-success">Status Enabled</div>
        <div id="message_error" style="display:none;" class="alert alert-sm alert-danger">Status Disabled</div>
        <!-- Main content -->
        <div class="content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div class="btn-group" id="buttonexport">
                                <h4>View Banners</h4>

                            </div>
                        </div>
                        <div class="panel-body">
                            <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                            <div class="btn-group">
                                <div class="buttonexport" id="buttonlist">
                                    <a class="btn btn-add" href="{{url('/admin/add-banner')}}"> <i class="fa fa-plus"></i> Add New Banner
                                    </a>
                                    @if(Session::has('flash_message_success')){
                                    <strong style="color:green;">{{session('flash_message_success')}}</strong>
                                    }
                                    @endif
                                </div>
                            </div>
                            <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                            <div class="table-responsive">
                                <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                    <thead>
                                    <tr class="info">
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Sort Order</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($banners as $banner)
                                        <tr>
                                            <td>{{$banner->id}}</td>
                                            <td>{{$banner->name}}</td>
                                            <td>{{$banner->sort_order}}</td>
                                            <td> @if(!empty($banner->image)){
                                                <img src="{{asset('/uploads/banners/' .$banner->image)}}" alt="" style="width: 200px ;height: 120px">
                                                }
                                                @endif
                                            </td>
                                            <td>
                                                <input type="checkbox" id="bstatus" class="BannerStatus btn btn-success" rel="{{$banner->id}}" data-toggle="toggle" data-on="On"
                                                       data-off="Off" data-onstyle="success" data-offstyle="danger"
                                                       @if($banner['status']=='1') checked @endif >

                                            </td>

                                            <td>
                                                <a href="{{url('/admin/edit-banner/'.$banner->id)}}" type="button" class="btn btn-add btn-sm" ><i class="fa fa-pencil"></i></a>
                                                <a href="{{url('/admin/delete-banner/'.$banner->id)}}" type="button" class="btn btn-danger btn-sm" ><i class="fa fa-trash-o"></i> </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection