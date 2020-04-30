@extends('admin.layouts.master')
@section('title','Products Attributes')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="fa fa-users"></i>
            </div>
            <div class="header-title">
                <h1>Add Products Attributes</h1>
                <small>Products Attributes</small>
            </div>
        </section>
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
                                @if(Session::has('flash_message_successs'))
                                <strong style="color:red;">{{session('flash_message_successs')}}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="panel-body">

                            <form class="col-sm-6" action="{{url('/admin/add-attributes/'.$product->id)}}" method="post" enctype="multipart/form-data">
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
                                    <div class="field_wrapper">
                                            <div style="display: flex;">
                                                <input type="text" name="sku[]" placeholder="SKU" id="sku" class="form-control" style="width: 120px; margin-right: 5px;"/>
                                                <input type="text" name="size[]" placeholder="Size" id="size" class="form-control" style="width: 120px; margin-right: 5px;"/>
                                                <input type="text" name="price[]" placeholder="Price" id="price" class="form-control" style="width: 120px; margin-right: 5px;"/>
                                                <input type="text" name="stock[]" placeholder="Stock" id="stock" class="form-control" style="width: 120px; margin-right: 5px;"/>
                                                <a href="javascript:void(0);" class="add_button" class="form-control" title="Add field" >Add</a>
                                            </div>
                                    </div>
                                </div>
                                <div class="reset-button">
                                    <input type="submit" class="btn btn-success" value="Add Attribute">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- View Attribute -->
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
                                    <form action="{{url('/admin/edit-attributes/'.$productDetails->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                    <thead>
                                    <tr class="info">
                                        <th>ID</th>
                                        <th>SKU</th>
                                        <th>Size</th>
                                        <th>Price</th>
                                        <th>Stock</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($productDetails['attributes'] as $attribute)
                                        <tr>
                                            <td style="display: none;"><input type="hidden" name="attr[]" value="{{$attribute->id}}"  style="text-align:center;"></td>
                                            <td>{{$attribute->id}}</td>
                                            <td><input type="text" name="sku[]" value="{{$attribute->sku}} " style="text-align:center;"></td>
                                            <td><input type="text" name="size[]" value="{{$attribute->size}} "  style="text-align:center;"></td>
                                            <td><input type="text" name="price[]" value="{{$attribute->price}} "  style="text-align:center;"></td>
                                            <td><input type="text" name="stock[]" value="{{$attribute->stock}} "  style="text-align:center;"></td>
                                            <td  style="text-align:center;">
                                                <div class="btn-group">
                                                    <input type="submit" value="Update" class="btn btn-success">
                                                    <a href="/admin/delete-attributes/{{$attribute->id}}" type="button" class="btn btn-danger btn-sm" ><i class="fa fa-trash-o"></i> </a>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    </form>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection