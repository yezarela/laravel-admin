@extends('layouts.admin')

@section('content')
    
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Roles
      <small>Optional description</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-gears"></i> Settings</a></li>
      <li class="active">Roles</li>
   </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

   <div class="row">
      <div class="col-xs-12">
         <div class="box">
         <div class="box-header">
            <h3 class="box-title">All Roles</h3>
            <div class="box-tools">
                            <a href="{{ url('admin/settings/roles/new')}}" type="submit" class="btn btn-primary">New Role</a>

                
              </div>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
            <table id="roles-table" class="table table-bordered table-hover">
               <thead>
               <tr>
               <th>No</th>
               <th width="150">Name</th>
               <th>Permissions</th>
               <th width="150">Actions</th>
               </tr>
               </thead>
               <tbody>
               
               @foreach($roles as $role)
                   <tr>
                   <td>{{ $loop->iteration }}</td>
                   <td>{{ $role->name }}</td>
                   <td>{{ $role->all_permissions }}</td>
                   <td>
                     <a class="btn btn-success" href="{{ url('admin/settings/roles/edit/'.$role->id) }}">Edit</a>
                     <a class="btn btn-danger" href="{{ url('admin/settings/roles/delete/'.$role->id) }}">Delete</a>
                   </td>
                   </tr>
               @endforeach
               </tbody>
              
            </table>
         </div>
         <!-- /.box-body -->
         </div>
         <!-- /.box -->

      
      </div>
      <!-- /.col -->
   </div>
   <!-- /.row -->
   

</section>
<!-- /.content -->

@endsection


@section('scripts')
   
@endsection