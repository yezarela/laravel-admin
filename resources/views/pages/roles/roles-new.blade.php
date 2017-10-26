@extends('layouts.admin')

@section('content')
    
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Roles
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-gears"></i> Settings</a></li>
      <li class="active">Roles</li>
   </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

   <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
      {{Form::open(['url' => 'admin/settings/roles/create'])}}

        <div class="box-header with-border">
          <h3 class="box-title">New Role</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label>Role Name</label>
                  <input type="text" class="form-control" required name="role_name" placeholder="Enter Role name">
                </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
             <div class="form-group">
                  <label>Permissions</label>
                </br>
                @foreach($groups as $group)
                <label>
                  <input type="checkbox" class="minimal" id="manage-{{$group['group_name']}}">&nbsp; Manage {{$group['group_name']}}
                </label>
                @foreach($group['permissions'] as $permission)
                <div style="display:block;margin-left:20px;">
                  <label>
                     <input type="checkbox" value="{{$permission->name}}" name="permissions[]" class="minimal {{$group['group_name']}}">&nbsp; {{$permission->name}}
                  </label>
                </div>
                @endforeach
                @endforeach
                 
                
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
      <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/admin-lte/plugins/iCheck/all.css') }}">
@endsection

@section('scripts')
   <!-- iCheck 1.0.1 -->
<script src="{{ asset('assets/vendor/admin-lte/plugins/iCheck/icheck.min.js') }}"></script>
<script>
  $(function () {
    

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue',
    
    })

    @foreach($groups as $group)

    $('#manage-{{$group["group_name"]}}').on('ifUnchecked', function(event){
       $('.{{$group["group_name"]}}').iCheck('uncheck');
    });

    $('#manage-{{$group["group_name"]}}').on('ifChecked', function(event){
       $('.{{$group["group_name"]}}').iCheck('check');
    });

    @endforeach

  })
</script>
@endsection