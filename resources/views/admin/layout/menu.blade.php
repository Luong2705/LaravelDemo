<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="admin_asset/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Nhóm 17</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="admin_asset/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          @if(Auth::check())
          <a href="admin/user/sua/{{Auth::user()->id}}" class="d-block">{{Auth::user()->name}}</a>
          @endif
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Thể loại
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="admin/theloai/danhsach" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="admin/theloai/them" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm danh sách</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fab fa-accusoft"></i>
              <p>
                Loại tin
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="admin/loaitin/danhsach" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="admin/loaitin/them" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm danh sách</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Tin tức
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="admin/tintuc/danhsach" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="admin/tintuc/them" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm danh sách</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-photo-video"></i>
              <p>
                Slide
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="admin/slide/danhsach" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="admin/slide/them" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm danh sách</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="admin/user/danhsach" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="admin/user/them" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm danh sách</p>
                </a>
              </li>
            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>