@extends('admin.layouts.master')
@section('title','Add Product')
@section('content')  
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>Add Product</h1>
                  <small>products</small>
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
                              <a class="btn btn-add " href="{{url('/admin/viewproduct')}}"> 
                              <i class="fa fa-list"></i>  View Product </a>  

                           </div>
                        </div>
                        <div class="panel-body">
                       
                           <form class="col-sm-6" action="{{url('/admin/add-product')}}" method="post" enctype="multipart/form-data">
                           @csrf 
                               <div class="form-group">
                                     <label>Under Category</label>
                                     <select name="cat_id" id="cat_id" class="form-control">
                                     <option value='' selected disabled> select </option>
                                     @foreach($categories as $cat)
                                           <option value = {{ $cat->id }}> {{ $cat->name }} </option>
                                     @endforeach
                                     </select><br>
                                  </div>
                              <div class="form-group">
                                 <label>Product Name</label>
                                 <input type="text" class="form-control" placeholder="Enter Product Name" name="product_name" id="product_name" required>
                              </div>
                              <div class="form-group">
                                 <label>Product code Name</label>
                                 <input type="text" class="form-control" placeholder="Enter product code" name="product_code" id="product_code" required>
                              </div>
                              <div class="form-group">
                                 <label>Product color</label>
                                 <input type="text" class="form-control" placeholder="Enter Product color" name="product_color" id="product_color" required>
                              </div>
                              <div class="form-group">
                                 <label>Product Description</label>
                                 <textarea name="product_description" id="product_description" class="form-control"></textarea>
                              </div>
                              
                              <div class="form-group">
                                 <label>Product Price</label>
                                 <input type="number" class="form-control" placeholder="Enter Product Price" name="product_price" id="product_price" required>
                              </div>
                              <div class="form-group">
                                 <label>Picture upload</label>
                                 <input type="file" name="img">
                              </div>
                              <div class="reset-button">
                                 <input type="submit" class="btn btn-success" value="Add Product">
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