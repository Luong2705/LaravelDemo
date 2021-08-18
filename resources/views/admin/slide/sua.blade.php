@extends('admin/layout/index')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Slide</h1>
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
                <h3 class="card-title">{{$slide->Ten}}</h3>
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
                <form action="admin/slide/sua/{{$slide->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                   
                    <div class="form-group">
                        <label>Tên</label>
                        <input type="text" class="form-control" name="Ten" value="{{$slide->Ten}}"placeholder="Nhập tên slide" style="width:40%">
                    </div>
                  
                    <div class="form-group">
                        <label>Nội dung</label>                       
                              <textarea name="NoiDung" class="textarea" placeholder="Place some text here"
                                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$slide->NoiDung}}</textarea>                          
                    </div>
                    <div class="form-group">
                        <label>Link</label>
                        <input type="text" class="form-control" name="link" value="{{$slide->link}}" placeholder="Nhập tên link" style="width:40%">
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <p><img src="upload/slide/{{$slide->Hinh}}" alt=""></p>
                        <input type="file" name="Hinh" class="form-control">
                    </div>
                   
                        <button type="submit" class="btn btn-primary">Sửa</button>
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
