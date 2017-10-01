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

   <div class="row">
      <div class="col-xs-12">
         <div class="box">
         <div class="box-header">
            <h3 class="box-title">All Users</h3>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
            <table id="users-table" class="table table-bordered table-hover">
               <thead>
               <tr>
               <th>No</th>
               <th>Name</th>
               <th>Email</th>
               <th>Created At</th>
               <th>Actions</th>
               </tr>
               </thead>
              
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
   <script>
      $(function () {
         var t = $('#users-table').DataTable({
               serverSide: true,
               processing: true,
               ajax: '/admin/settings/users-data',
               columns: [
                  {data: 0, name: 'id'},
                  {data: 1, name: 'name'},
                  {data: 2, name: 'email'},
                  {data: 3, name: 'created_at'},
                  {data: 4, name: 'actions'},
               ],
               columnDefs: [ {
                     searchable: false,
                     orderable: false,
                     targets: 4,
                     render: function ( data, type, row, meta ) {
                        return `<a class="btn btn-primary" href="{{ url('admin/settings/users/edit/${data}') }}">Edit</a>`;
                     }
               } ],
               
         });

          t.on( 'order.dt search.dt', function () {
            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                  cell.innerHTML = i+1;
            });
         }).draw();
      });
   </script>
@endsection