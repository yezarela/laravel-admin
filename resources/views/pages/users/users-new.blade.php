@extends('layouts.admin')

@section('content')
    
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Users
      <small>Optional description</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-gears"></i> Settings</a></li>
      <li class="active">Users</li>
   </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

   <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
      {{Form::open(['url' => 'admin/settings/users/create'])}}

        <div class="box-header with-border">
          <h3 class="box-title">New User</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <label>User Role</label>
                <select class="form-control select2" name="role" style="width: 100%;">
                @foreach($roles as $role)
                  <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                @endforeach
                </select>
              </div>
               <div class="form-group has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
                  <label>Full Name</label>                  
                  <input type="text" class="form-control" name="name" placeholder="Full name">
                  
                  @if ($errors->has('name'))
                  <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                  </span> 
                  @endif
               </div>
               <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                  <label>Email Address</label>                                    
                  <input type="email" class="form-control" name="email" placeholder="Email">
                  
                  @if ($errors->has('email'))
                  <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                  </span> 
                  @endif
               </div>
               <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                  <label>Password</label>                                    
                  <input type="password" class="form-control" name="password" placeholder="Password">
                  
                  @if ($errors->has('password'))
                  <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                  </span> 
                  @endif
               </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
           
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
        {{Form::close()}}
      </div>
      <!-- /.box -->
   

</section>
<!-- /.content -->

@endsection

@section('styles')
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/select2/dist/css/select2.min.css') }}">
@endsection

@section('scripts')
<!-- Select2 -->
<script src="{{ asset('assets/vendor/select2/dist/js/select2.full.min.js') }}"></script>
<script>
  $(function () { 
   $('.select2').select2()
  })
</script>
@endsection