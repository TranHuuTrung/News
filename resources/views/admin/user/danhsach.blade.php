@extends('admin.layout.index') 
@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Danh sách người dùng</h3>
                </div>
                @if (session('thongbao'))
				<div class="alert alert-success alert-dismissible">
					{{session('thongbao')}}
                </div>
                @endif
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Họ Tên</th>
                                <th>Email</th>
                                <th>Quyền</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $us)
                            <tr>
                                <td>{{$us->id}}</td>
                                <td>{{$us->name}}</td>
                                <td>{{$us->email}}</td>
                                <td>
                                    @if ($us->quyen === 1) {{"Admin"}} @else {{"Thường"}} @endif
                                </td>
                                <td class="text-center">
                                    <a href="admin/user/sua/{{$us->id}}"><i class="fa fa-pencil"></i>&nbsp; Sửa</a>
                                </td>
                                <td class="text-center">
                                    <a href="admin/user/xoa/{{$us->id}}"><i class="fa fa-trash"></i>&nbsp; Xóa</a>
                                </td>
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
 
@section('script')
<script>
    $(function () {
            $('#example1').DataTable()
        })

</script>
@endsection