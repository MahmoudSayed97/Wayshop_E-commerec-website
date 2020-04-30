@extends('admin.layouts.master')
@section('title','View Product')
         @section('content')
<!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-product-hunt"></i>
               </div>
               <div class="header-title">
                  <h1>View Products</h1>
                  <small>Products List</small>
               </div>
            </section>
            <div id="message_success" style="display:none;" class="alert alert-sm alert-success">Status Enabled</div>
            <div id="message_error" style="display:none;" class="alert alert-sm alert-danger">Status Disabled</div>
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
            <div class="content">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="#">
                                 <h4>View Products</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                 <a class="btn btn-add" href="{{url('/admin/add-product')}}"> <i class="fa fa-plus"></i> Add Product
                                 </a>  
                              </div>
                              <button class="btn btn-exp btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Table Data</button>
                              <ul class="dropdown-menu exp-drop" role="menu">
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'json',escape:'false'});"> 
                                    <img src="assets/dist/img/json.png" width="24" alt="logo"> JSON</a>
                                 </li>
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});">
                                    <img src="assets/dist/img/json.png" width="24" alt="logo"> JSON (ignoreColumn)</a>
                                 </li>
                                 <li><a href="#" onclick="$('#dataTableExample1').tableExport({type:'json',escape:'true'});">
                                    <img src="assets/dist/img/json.png" width="24" alt="logo"> JSON (with Escape)</a>
                                 </li>
                                 <li class="divider"></li>
                                 <li><a href="#" onclick="$('#dataTableExample1').tableExport({type:'xml',escape:'false'});">
                                    <img src="assets/dist/img/xml.png" width="24" alt="logo"> XML</a>
                                 </li>
                                 <li><a href="#" onclick="$('#dataTableExample1').tableExport({type:'sql'});"> 
                                    <img src="assets/dist/img/sql.png" width="24" alt="logo"> SQL</a>
                                 </li>
                                 <li class="divider"></li>
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'csv',escape:'false'});"> 
                                    <img src="assets/dist/img/csv.png" width="24" alt="logo"> CSV</a>
                                 </li>
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'txt',escape:'false'});"> 
                                    <img src="assets/dist/img/txt.png" width="24" alt="logo"> TXT</a>
                                 </li>
                                 <li class="divider"></li>
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'excel',escape:'false'});"> 
                                    <img src="assets/dist/img/xls.png" width="24" alt="logo"> XLS</a>
                                 </li>
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'doc',escape:'false'});">
                                    <img src="assets/dist/img/word.png" width="24" alt="logo"> Word</a>
                                 </li>
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'powerpoint',escape:'false'});"> 
                                    <img src="assets/dist/img/ppt.png" width="24" alt="logo"> PowerPoint</a>
                                 </li>
                                 <li class="divider"></li>
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'png',escape:'false'});"> 
                                    <img src="assets/dist/img/png.png" width="24" alt="logo"> PNG</a>
                                 </li>
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});"> 
                                    <img src="assets/dist/img/pdf.png" width="24" alt="logo"> PDF</a>
                                 </li>
                              </ul>
                           </div>
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Category ID</th>
                                       <th>Product name</th>
                                       <th>Product code</th>
                                       <th>Product color</th>
                                       <th>Image</th>
                                       <th>Price</th>
                                       <th>Status</th>
                                        <th>Featured</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 @foreach($products as $prod)
                                    <tr>
                                       <td>{{$prod->cat_id}}</td>
                                       <td>{{$prod->name}}</td>
                                       <td>{{$prod->code}}</td>
                                       <td>{{$prod->color}}</td>
                                       <td>
                                @if(!empty($prod->image)){
                                   <img src="{{asset('/uploads/products/' .$prod->image)}}" alt="" style="width:100px;">
                                }
                                @endif
                                </td>
                                      
                                       <td>{{$prod->price}}</td>
                                       <td>
                                          <input type="checkbox" id="pstatus" class="ProductStatus btn btn-success" rel="{{$prod->id}}" data-toggle="toggle" data-on="On"
                                          data-off="Off" data-onstyle="success" data-offstyle="danger"
                                          @if($prod['status']=='1') checked @endif>

                                       </td>
                                        <td>
                                            <input type="checkbox" id="featured" class="FeaturedStatus btn btn-success" rel="{{$prod->id}}" data-toggle="toggle" data-on="On"
                                                   data-off="Off" data-onstyle="success" data-offstyle="danger"
                                                   @if($prod['status']=='1') checked @endif>

                                        </td>
                                       <td>
                                          <a href="{{url('/admin/add-images/'.$prod->id)}}" title="Add Images" type="button" class="btn btn-info btn-sm" ><i class="fa fa-image"></i></a>
                                          <a href="{{url('/admin/add-attributes/'.$prod->id)}}" title="Add Attributes" type="button" class="btn btn-warning btn-sm" ><i class="fa fa-list"></i></a>
                                          <a href="{{url('/admin/edit-product/'.$prod->id)}}" title="Edit Products" type="button" class="btn btn-add btn-sm" ><i class="fa fa-pencil"></i></a>
                                          <a href="{{url('/admin/delete-product/'.$prod->id)}}" title="Delete Products" type="button" class="btn btn-danger btn-sm" ><i class="fa fa-trash-o"></i> </a>
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