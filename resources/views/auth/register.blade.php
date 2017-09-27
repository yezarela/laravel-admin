@extends('layouts.auth') 

@section('content')


<div class="register-box">
   <div class="register-logo">
      <a href="../../index2.html"><b>Admin</b>LTE</a>
   </div>

   <div class="register-box-body">
      <p class="login-box-msg">Register a new membership</p>

      <form method="POST" action="{{ route('register') }}">
         {{ csrf_field() }}
         <div class="form-group has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
            <input type="text" class="form-control" name="name" placeholder="Full name">
            <span class="glyphicon glyphicon-user form-control-feedback"></span> 
            
            @if ($errors->has('name'))
            <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
            </span> 
            @endif
         </div>
         <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
            <input type="email" class="form-control" name="email" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span> 
            
            @if ($errors->has('email'))
            <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
            </span> 
            @endif
         </div>
         <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span> 
            
            @if ($errors->has('password'))
            <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
            </span> 
            @endif
         </div>
         <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password_confirmation" placeholder="Retype password">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
         </div>
         <div class="row">
            <div class="col-xs-8">
               <a href="{{ route('login') }}" class="text-center">I already have an account</a>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
               <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div>
            <!-- /.col -->
         </div>
      </form>


   </div>
   <!-- /.form-box -->
</div>
<!-- /.register-box -->

@endsection