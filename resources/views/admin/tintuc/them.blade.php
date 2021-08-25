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
                <h3 class="card-title">Thêm</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                        {{$err}}<br>
                        @endforeach
                    </div>
                @endif
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif
                @if(session('loi'))
                    <div class="alert alert-danger">
                        {{session('loi')}}
                    </div>
                @endif
                <form action="admin/tintuc/them" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Thể loại</label>
                        <select name="TheLoai" id="TheLoai" class="form-control" style="width: 40%">
                            @foreach($theloai as $tl)
                                <option value="{{ $tl->id }}">{{ $tl->Ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Loại tin</label>
                        <select name="LoaiTin" id="LoaiTin" class="form-control" style="width: 40%">
                           
                            @foreach($loaitin as $lt)
                                <option value="{{ $lt->id }}">{{ $lt->Ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input type="text" class="form-control" name="TieuDe" placeholder="Nhập tên tiêu đề" style="width:40%">
                    </div>
                    <div class="form-group">
                        <label>Tóm tắt</label>            
                              <textarea name="TomTat" class="textarea" placeholder="Place some text here"
                                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>   
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>                       
                              <textarea name="NoiDung" class="textarea" placeholder="Place some text here"
                                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>                          
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input type="file" name="Hinh" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nội bật</label>
                        <label class="radio-inline">
                            <input type="radio" name="NoiBat" value="1" checked="">Có
                        </label>
                        <label style="margin-left: 20px" class="radio-inline">
                            <input type="radio" name="NoiBat" value="0">Không
                        </label>
                    </div>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                        <button type="reset" class="btn btn-primary">Làm mới</button>    
                </form>
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
      $(document).ready(function () {
          $("#TheLoai").change(function(){
              var idTheLoai = $(this).val();
              $.get("admin/ajax/loaitin/"+idTheLoai,function(data){
                  $('#LoaiTin').html(data);
              });
          });
      });
  </script>
@endsection