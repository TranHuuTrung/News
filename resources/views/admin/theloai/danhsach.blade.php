@extends('admin.layout.index') 
@section('content')
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Danh sách các thể loại</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="tableTheloai" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>ID</th>
								<th>Tên</th>
								<th>Tên không dấu</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($theloai as $tl)
							<tr>
								<td>{{$tl->id}}</td>
								<td>{{$tl->Ten}}</td>
								<td>{{$tl->TenKhongDau}}</td>
								<td class="center">
									<a href="admin/theloai/sua/{{$tl->id}}"><i class="fa fa-pencil"></i>&nbsp; Sửa</a>
								</td>
								<td class="center">
									<a href="admin/theloai/xoa/{{$tl->id}}"><i class="fa fa-trash"></i>&nbsp; Xóa</a>
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
		$('#tableTheloai').DataTable();
	})

</script>
@endsection