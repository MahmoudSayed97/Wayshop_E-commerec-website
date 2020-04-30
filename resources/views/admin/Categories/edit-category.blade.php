@extends('admin.layouts.master')
@section('title','Edit Category')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="fa fa-users"></i>
            </div>
            <div class="header-title">
                <h1>Edit Category</h1>
                <small>Edit Categories</small>
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
                                <a class="btn btn-add " href="{{url('/admin/viewcategories')}}">
                                    <i class="fa fa-list"></i>  View Category </a>

                            </div>
                        </div>
                        <div class="panel-body">

                            <form class="col-sm-6" action="{{url('/admin/edit-category/'.$catDetails->id)}}" method='post'>
                                @csrf
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input type="text" class="form-control" value="{{$catDetails->name}}" name="category_name" id="category_name"required>
                                </div>
                                <div class="form-group">
                                    <label>Url</label>
                                    <input type="text" class="form-control" value="{{$catDetails->url}}" name="category_Url" id="category_Url" required>
                                </div>
                                <div class="form-group">
                                    <label>Parient Category</label>
                                    <select>
                                        <option value="0">Parient Category</option>
                                        @foreach($levels as $level)
                                            <option value="{{$level->id}} @if($level->id==$catDetails->parient_id) selected @endif">{{$level->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Category Description</label>
                                    <textarea name="category_description" id="category_description" class="form-control">
                                 {{$$catDetails->description}}
                                 </textarea>
                                </div>
                                <div class="reset-button">
                                    <input type="submit" class="btn btn-success" value="Add Category">
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