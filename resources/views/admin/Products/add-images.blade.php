@extends('admin.layouts.master')
@section('title','Products Images')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="fa fa-users"></i>
            </div>
            <div class="header-title">
                <h1>Products Images</h1>
                <small> Add Products Images</small>
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

                            <form class="col-sm-6" action="{{url('/admin/add-images/'.$product->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Product Name: </label>  <span style="color: darkblue;font-size: large">{{$product->name}}</span>
                                </div>
                                <div class="form-group">
                                    <label>Product code: </label>  <span style="color: darkblue;font-size: large">{{$product->code}}</span>
                                </div>
                                <div class="form-group">
                                    <label>Product color: </label>  <span style="color: darkblue;font-size: large">{{$product->color}}</span>
                                </div>
                                <div class="form-group">
                                    <label>Images: </label>
                                    <input type="file" name="image[]" id="image" multiple="multiple" required>
                                </div>
                                <div class="reset-button">
                                    <input type="submit" class="btn btn-success" value="Add Image">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <div class="panel-body">
            <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
            <div class="btn-group">
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
            <div class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-bd lobidrag">
                            <div class="panel-heading">
                                <div class="btn-group" id="buttonexport">
                                    <a href="#">
                                        <h4>View Attributes</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                                <div class="btn-group">
                                    <div class="buttonexport" id="buttonlist">
                                        <a class="btn btn-add" href="{{url('/admin/add-attributes/'.$product->id)}}"> <i class="fa fa-plus"></i> Add Attributes
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
                                            @csrf
                                            <thead>
                                            <tr class="info">
                                                <th>ID</th>
                                                <th>Product ID</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($Images as $Image)
                                                <tr>
                                                    <td style="display: none;">{{$Image->id}}"</td>
                                                    <td>{{$Image->id}}</td>
                                                    <td>{{$Image->product_id}}</td>
                                                    <td><img src="{{url('uploads/products/'.$Image->image)}}" style="width: 150px; height: 100px;"></td>
                                                    <td  style="text-align:center;">
                                                        <div class="btn-group">
                                                            <a href="/admin/delete-image/{{$Image->id}}" type="button" class="btn btn-danger btn-sm" ><i class="fa fa-trash-o"></i> </a>
                                                        </div>

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
        </div>
    </div>
    <!-- /.content-wrapper -->
    <!-- /.content-wrapper -->
@endsection