@extends('layouts.admin')

@section('content')
    
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Roles
      <small>Optional description</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
      <li class="active">Here</li>
   </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

   <div class="row">
      <div class="col-xs-12">
         <div class="box">
         <div class="box-header">
            <h3 class="box-title">All Roles</h3>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
            <table id="roles-table" class="table table-bordered table-hover">
               <thead>
               <tr>
               <th>Id</th>
               <th>Name</th>
               </tr>
               </thead>
               <tbody>
               @foreach($permissions as $permission)
                   <tr>
                   <td>{{ $permission->id }}</td>
                   <td>{{ $permission->name }}</td>
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