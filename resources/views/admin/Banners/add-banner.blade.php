@extends('admin.layouts.master')
@section('title','Add Banner')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="fa fa-image"></i>
            </div>
            <div class="header-title">
                <h1>Add Banner</h1>
                <small>Banners</small>
            </div>
        </section>
        @if(Session::has('flash_message_error'))
            <div class="alert alert-sm alert-danger alert-block" role="alert" id="fadeoutthdive">
                <button type="button" class="close" data-dismiss="alert" aria-lable="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>{!! session('flash_message_error') !!}</strong>
            </div>
        @endif
        @if(Session::has('flash_message_success'))
            <div class="alert alert-sm alert-success alert-block" role="alert" id="fadeoutthdive">
                <button class="close" data-dismiss="alert" aria-lable="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>{{ session('flash_message_success')}}</strong>
            </div>
    @endif
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- Form controls -->
                <div class="col-sm-12">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div class="btn-group" id="buttonlist">
                                <a class="btn btn-add " href="{{url('/admin/banners')}}">
                                    <i class="fa fa-list"></i>  View Banners </a>

                            </div>
                        </div>
                        <div class="panel-body">

                            <form class="col-sm-6" action="{{url('/admin/add-banner')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Name" name="banner_name" id="banner_name" required>
                                </div>
                                <div class="form-group">
                                    <label>Text Style</label>
                                    <input type="text" class="form-control" placeholder="Enter Text Style" name="text_style" id="text_style" required>
                                </div>
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea name="content" id="content" class="form-control"></textarea>

                                </div>

                                <div class="form-group">
                                    <label>Link</label>
                                    <input type="text" class="form-control" placeholder="Enter Link" name="link" id="link" required>
                                </div>
                                <div class="form-group">
                                    <label>Sort Order</label>
                                    <input type="text" class="form-control" placeholder="Sort Order" name="sort_order" id="link" required>
                                </div>
                                <div class="form-group">
                                    <label>Upload Picture</label>
                                    <input type="file" name="img">
                                </div>
                                <div class="reset-button">
                                    <input type="submit" class="btn btn-success" value="Add Banner">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection