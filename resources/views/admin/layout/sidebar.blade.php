<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="admin_asset/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Tran Huu Trung</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li  class="header">MAIN NAVIGATION</li>
      <li class="{{ Request::is('admin/trangchu') ? 'active' : '' }}">
        <a href="{{route('admin.index')}}">
          <i class="fa fa-dashboard"></i> <span>Trang chủ</span>
        </a>
      </li>
      <li class="{{ (Request::is('admin/theloai/danhsach')|| Request::is('admin/theloai/them')) ? 'active treeview' : 'treeview' }}">
        <a href="admin/theloai/danhsach">
          <i class="fa fa-file-text-o"></i> <span>Thể loại</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ Request::is('admin/theloai/danhsach') ? 'active' : '' }}"><a href="admin/theloai/danhsach"><i class="fa fa-circle-o"></i> Danh sách</a></li>
          <li class="{{ Request::is('admin/theloai/them') ? 'active' : '' }}"><a href="admin/theloai/them"><i class="fa fa-circle-o"></i>Thêm mới</a></li>
        </ul>
      </li>
      <li class="{{ (Request::is('admin/loaitin/danhsach')|| Request::is('admin/loaitin/them')) ? 'active treeview' : 'treeview' }}">
        <a href="admin/loaitin/danhsach">
          <i class="fa fa-list-alt"></i> <span>Loại tin</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ Request::is('admin/loaitin/danhsach') ? 'active' : '' }}"><a href="admin/loaitin/danhsach"><i class="fa fa-circle-o"></i> Danh sách</a></li>
          <li class="{{ Request::is('admin/loaitin/them') ? 'active' : '' }}"><a href="admin/loaitin/them"><i class="fa fa-circle-o"></i>Thêm mới</a></li>
        </ul>
      </li>
      <li class="{{ (Request::is('admin/tintuc/danhsach')|| Request::is('admin/tintuc/them')) ? 'active treeview' : 'treeview' }}">
        <a href="admin/tintuc/danhsach">
          <i class="fa fa-newspaper-o"></i> <span>Tin tức</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ Request::is('admin/tintuc/danhsach') ? 'active' : '' }}"><a href="admin/tintuc/danhsach"><i class="fa fa-circle-o"></i> Danh sách</a></li>
          <li class="{{ Request::is('admin/tintuc/them') ? 'active' : '' }}"><a href="admin/tintuc/them"><i class="fa fa-circle-o"></i>Thêm mới</a></li>
        </ul>
      </li>
      <li class="{{ (Request::is('admin/slide/danhsach')|| Request::is('admin/slide/them')) ? 'active treeview' : 'treeview' }}">
        <a href="admin/slide/danhsach">
          <i class="fa fa-sliders"></i> <span>Slide</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ Request::is('admin/slide/danhsach') ? 'active' : '' }}"><a href="admin/slide/danhsach"><i class="fa fa-circle-o"></i> Danh sách</a></li>
          <li class="{{ Request::is('admin/slide/them') ? 'active' : '' }}"><a href="admin/slide/them"><i class="fa fa-circle-o"></i>Thêm mới</a></li>
        </ul>
      </li>
      <li class="{{ (Request::is('admin/user/danhsach')|| Request::is('admin/user/them')) ? 'active treeview' : 'treeview' }}">
        <a href="admin/user/danhsach">
          <i class="fa fa-users"></i> <span>Người dùng</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ Request::is('admin/user/danhsach') ? 'active' : '' }}"><a href="admin/user/danhsach"><i class="fa fa-circle-o"></i> Danh sách</a></li>
          <li class="{{ Request::is('admin/user/them') ? 'active' : '' }}"><a href="admin/user/them"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
        </ul>
      </li>
  </section>
  <!-- /.sidebar -->
</aside>
    