@extends('layouts.master')
@section('content')
    <div class="contact-box-main">
        <div class="container">
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
            <div class="row">
                <div class="col-md-3"><</div>
                <div class="col-md-6" >
                    <div class="contact-form-right">
                        <h1>Change Your Address</h1>
                        <form action="{{url('/change-address')}}" method="post" >
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="{{$userDeatils->name}}" id="name" name="name"  data-error="Please Enter Your Name">
                                        @if($errors->has('name'))
                                            <div class="error" style="font-size: 20px;color: #e7320a;"> {{$errors->first('name')}}</div>
                                        @endif
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="{{$userDeatils->address}}" id="address" name="address"  data-error="Please Enter Your Address">
                                        @if($errors->has('address'))
                                            <div class="error" style="font-size: 20px;color: #e7320a;"> {{$errors->first('address')}}</div>
                                        @endif
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="{{$userDeatils->city}}" id="city" name="city"  data-error="Please Enter Your State">
                                        @if($errors->has('city'))
                                            <div class="error" style="font-size: 20px;color: #e7320a;"> {{$errors->first('city')}}</div>
                                        @endif
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="{{$userDeatils->state}}" id="state" name="state"  data-error="Please Enter Your State">
                                        @if($errors->has('state'))
                                            <div class="error" style="font-size: 20px;color: #e7320a;"> {{$errors->first('state')}}</div>
                                        @endif
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                               <select id="country" name="country" class="form-control">
                                   <option value="0">Select Your Country</option>
                                   @foreach($countries as $country)
                                       <option value="{{$country->name}}" @if($country->country_name==$userDeatils->country) selected @endif>{{$country->country_name}}</option>
                                       @endforeach
                               </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="{{$userDeatils->pincode}}" id="pincode" name="pincode"  data-error="Please Enter Your Pincode">
                                        @if($errors->has('pincode'))
                                            <div class="error" style="font-size: 20px;color: #e7320a;"> {{$errors->first('pincode')}}</div>
                                        @endif
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="number" class="form-control" placeholder="{{$userDeatils->mobile}}" id="mobile" name="mobile"  data-error="Please Enter Your Mobile">
                                        @if($errors->has('mobile'))
                                            <div class="error" style="font-size: 20px;color: #e7320a;"> {{$errors->first('mobile')}}</div>
                                        @endif
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="submit-button text-center">
                                        <button type="submit" class="btn hvr-hover" id="sub" >Save Address</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3"><</div>
            </div>
        </div>
    </div>
@endsection