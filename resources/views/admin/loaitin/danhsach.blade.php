@extends('admin/layout/index')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Loại tin</h1>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Danh sách</h3>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @if(session('thongbao'))
                  <div class="alert alert-success">
                    {{session('thongbao')}}
                  </div>
                @endif
                <table id="example1" class="table table-bordered table-striped" style="text-align: center">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Tên loại tin</th>
                    <th>Tên Không Dấu</th>
                    <th>Tên thể loại</th>
                    <th>Delete</th>
                    <th>Edit</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($loaitin as $lt)
                  <tr>
                    <td>{{$lt->id}}</td>
                    <td>{{$lt->Ten}}</td> 
                    <td>{{$lt->TenKhongDau}}</td>
                    <td>{{$lt->theloai->Ten}}</td>
                    <td><i class="fa fa-trash-o" aria-hidden="true"></i><a style="padding-left: 10px" href="admin/loaitin/xoa/{{$lt->id}}">Delete</a></td>
                    <td><i class="fa fa-pencil" aria-hidden="true"></i><a style="padding-left: 10px" href="admin/loaitin/sua/{{$lt->id}}">Edit</a></td>
                  </tr>
                    @endforeach
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
@section('script')
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endsection