@extends('layouts.auth') 

@section('content')

<div class="login-box">
   <div class="login-logo">
      <a href="{{ route('/') }}"><b>{{ config('app.name') }}</b> {{ config('app.alias') }}</a>
   </div>
   <!-- /.login-logo -->
   <div class="login-box-body">
      <p class="login-box-msg">Reset Password</p>

       @if (session('status'))
            <div class="alert alert-success">
                  {{ session('status') }}
            </div>
       @endif

      <form method="POST" action="{{ route('password.email') }}">
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
         
        
         <div class="row">
            <div class="col-xs-12">
               <button type="submit" class="btn btn-primary btn-block btn-flat">Send Password Reset Link</button>
            </div>
         </div>
      </form>

   </div>
   <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

@endsection 

