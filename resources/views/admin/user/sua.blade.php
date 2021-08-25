@extends('admin/layout/index')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User</h1>
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
                <h3 class="card-title">{{$user->name}}</h3>
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
             
                <form action="admin/user/sua/{{$user->id}}" method="post">
                    @csrf
                   
                    <div class="form-group">
                        <label>Họ tên</label>
                        <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Nhập họ tên" style="width:40%">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{$user->email}}" placeholder="Nhập email" style="width:40%">
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="changePassword" name="changePassword">
                        <label>Đổi mật khẩu</label>
                        <input type="password" class="form-control password" disabled="" name="password" placeholder="Nhập password" style="width:40%">
                    </div>
                    <div class="form-group">
                        <label>Nhập lại mật khẩu</label>
                        <input type="password" class="form-control password" disabled="" name="passwordAgain" placeholder="Nhập lại password" style="width:40%">
                    </div>
                   
                    <div class="form-group">
                        <label>Quyền người dùng</label>
                        <label class="radio-inline">
                            <input type="radio" name="quyen" value="0"
                            @if($user->quyen==0)
                            {{"checked"}}
                            @endif
                            >Thường
                        </label>
                        <label style="margin-left: 20px" class="radio-inline">
                            <input type="radio" name="quyen" value="1"
                            @if($user->quyen==1)
                            {{"checked"}}
                            @endif
                            >Admin
                        </label>
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
@section('script')
<script>
    $(document).ready(function(){
        $("#changePassword").change(function(){
            if($(this).is(":checked")) $(".password").removeAttr("disabled");
            else $(".password").attr("disabled","");
        })
    });
</script>
@endsection