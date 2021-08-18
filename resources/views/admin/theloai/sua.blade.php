@extends('admin/layout/index')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thể loại</h1>
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
                <h3 class="card-title">{{$theloai->Ten}}</h3>
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
                <form action="admin/theloai/sua/{{$theloai->id}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Tên thể loại</label>
                        <input style="width:60%" type="text" class="form-control" value="{{$theloai->Ten}}" name="Ten" placeholder="Nhập tên thể loại">
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