@extends('layouts.auth') 

@section('content')

<div class="login-box">
   <div class="login-logo">
      <a href="../../index2.html"><b>{{ env('APP_NAME') }}</b> {{ env('APP_CODE') }}</a>
   </div>
   <!-- /.login-logo -->
   <div class="login-box-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form method="POST" action="{{ route('login') }}">
         {{ csrf_field() }}

      
         <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
            <input type="email" class="form-control" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

            @if ($errors->has('email'))
               <span class="help-block">
                     <strong>{{ $errors->first('email') }}</strong>
               </span>
            @endif
         </div>
         
         <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
            <input type="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

            @if ($errors->has('password'))
               <span class="help-block">
                     <strong>{{ $errors->first('password') }}</strong>
               </span>
            @endif
         </div>
         <div class="row">
            <div class="col-xs-8">
               <div class="checkbox icheck">
                  <label>
              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
              
            </label>
               </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
               <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
            <!-- /.col -->
         </div>
      </form>

      <a href="{{ route('password.request') }}" >I forgot my password</a><br>

   </div>
   <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

@endsection 




