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
                <div class="col-lg-6 col-sm-12" >
                    <div class="contact-form-right">
                        <h1>New User Sign Up!</h1>
                        <form action="{{url('/user-register')}}" method="post" >
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Your Name" id="name" name="name"  data-error="Please Enter Your Name">
                                        @if($errors->has('name'))
                                            <div class="error" style="font-size: 20px;color: #e7320a;"> {{$errors->first('name')}}</div>
                                        @endif
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Your Email" id="email" name="email"  data-error="Please Enter Your Email">
                                        @if($errors->has('email'))
                                            <div class="error" style="font-size: 20px;color: #e7320a;"> {{$errors->first('email')}}</div>
                                        @endif
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Your password" id="password" name="password"  data-error="Please Enter Your Password">
                                        @if($errors->has('password'))
                                            <div class="error" style="font-size: 20px;color: #e7320a;"> {{$errors->first('password')}}</div>
                                        @endif
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="submit-button text-center">
                                        <button type="submit" class="btn hvr-hover" id="sub" >Sign Up</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="contact-form-right">
                            <h1>Alerady a member ? just Sign In</h1>
                            <form action="{{url('/user-login')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Your Username or Email" id="email" name="email"  data-error="Please Enter Your Email">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Your password" id="password" name="password" data-error="Please Enter Your Password">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="submit-button text-center">
                                            <button type="submit" class="btn hvr-hover" id="sub" >Login</button>
                                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                                                <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
             </div>
        </div>
    </div>
@endsection