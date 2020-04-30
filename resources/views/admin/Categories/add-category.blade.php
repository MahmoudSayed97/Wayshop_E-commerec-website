@extends('admin.layouts.master')
@section('title','Add Category')
@section('content')  
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>Add Category</h1>
                  <small>Categories</small>
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
                              <i class="fa fa-list"></i>  View Categories </a>
                           </div>
                        </div>
                        <div class="panel-body">
                       
                           <form class="col-sm-6" action="{{url('/admin/add-category')}}" method='post'>
                           @csrf 
                              <div class="form-group">
                                 <label>Category Name</label>
                                 <input type="text" class="form-control" placeholder="Enter Category Name" name="category_name" id="category_name"required>
                              </div>
                              <div class="form-group">
                                 <label>Parent Category</label>
                                 <select name="parient_id" id="parient_id" class="form-control">
                                    <option value="0">Parent Category</option>
                                    @foreach($leves as $lev)
                                    <option value="{{$lev->id}}">{{$lev->name}}</option>
                                    @endforeach
                                 </select>
                    
                              </div>
                              <div class="form-group">
                                 <label>URL</label>
                                 <input type="text" class="form-control" placeholder="Url" name="category_Url" id="category_Url"required>
                              </div>
                              <div class="form-group">
                                 <label>Description</label>
                                 <textarea name="category_description" id="category_description" class="form-control"></textarea>
                                
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