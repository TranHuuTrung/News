@extends('admin.layout.index') 
@section('content')
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Danh sách Slide</h3>
				</div>
				@if (session('thongbao'))
				<div class="alert alert-success alert-dismissible">
					{{session('thongbao')}}
				</div>
				@endif
				<!-- /.box-header -->
				<div class="box-body">
					<table id="danhsachSlide" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>ID</th>
								<th>Tên</th>
								<th>Nội dung</th>
								<th>Hình</th>
								<th>Link</th>
								<th>Sửa</th>
								<th>Xóa</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($slide as $sl)
							<tr>
								<td>{{$sl->id}}</td>
								<td>{!!$sl->Ten!!}</td>
								<td>{!!$sl->NoiDung!!}</td>
								<td>
									<img width="400px" src="upload/slide/{{$sl->Hinh}}" alt="">
								</td>
								<td>{{$sl->link}}</td>
								<td class="text-center">
									<a href="admin/slide/sua/{{$sl->id}}"><i class="fa fa-pencil"></i>&nbsp; Sửa</a>
								</td>
								<td class="text-center">
									<a href="admin/slide/xoa/{{$sl->id}}"><i class="fa fa-trash"></i>&nbsp; Xóa</a>
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
            $('#danhsachSlide').DataTable()
        })

</script>
@endsection