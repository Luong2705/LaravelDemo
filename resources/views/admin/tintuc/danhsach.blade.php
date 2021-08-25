@extends('admin/layout/index')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
<<<<<<< HEAD
            <h1>Loại tin</h1>
=======
            <h1>Tin tức</h1>
>>>>>>> Luong
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
                    <th>Tiêu đề</th>
                    <th>Tóm tắt</th>
                    <th>Thể loại</th>
                    <th>Loại tin</th>
                    <th>Số lượt xem</th>
                    <th>Nổi bật</th>
                    <th>Delete</th>
                    <th>Edit</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($tintuc as $tt)
                  <tr>
                    <td>{{$tt->id}}</td>
                    <td>
                      <p>{{$tt->TieuDe}}</p>
                      <img src="upload/tintuc/{{$tt->Hinh}}" width="100px" alt="">
                    </td>
                    <td>{{$tt->TomTat}}</td>
                    <td>{{$tt->loaitin->theloai->Ten}}</td> 
                    <td>{{$tt->loaitin->Ten}}</td>
                    <td>{{$tt->SoLuotXem}}</td>
                    <td>
                      @if($tt->NoiBat==0){{'Không'}}
                      @else {{'Có'}}
                      @endif
                    </td>
                    <td><i class="fa fa-trash-o" aria-hidden="true"></i><a style="padding-left: 10px" href="admin/tintuc/xoa/{{$tt->id}}">Delete</a></td>
                    <td><i class="fa fa-pencil" aria-hidden="true"></i><a style="padding-left: 10px" href="admin/tintuc/sua/{{$tt->id}}">Edit</a></td>
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