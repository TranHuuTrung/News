@extends('admin.layout.index') 
@section('content')
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Danh sách tin tức</h3>
				</div>
				@if (session('thongbao'))
				<div class="alert alert-success alert-dismissible">
					{{session('thongbao')}}
				</div>
				@endif
				<!-- /.box-header -->
				<div class="box-body">
					<table id="danhsachtintuc" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>ID</th>
								<th>Tiêu đề</th>
								<th>Tóm tắt</th>
								<th>Lượt xem</th>
								<th>Nổi bật</th>
								<th>Loại tin</th>
								<th>Thể loại</th>
								<th>Sửa</th>
								<th>Xóa</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($tintuc as $tt)
							<tr>
								<td>{{$tt->id}}</td>
								<td>
									<p>{{$tt->TieuDe}}</p>
									<img width="100px" src="upload/tintuc/{{$tt->Hinh}}"/>
								</td>
								<td>{!!$tt->TomTat!!}</td>
								<td>{{$tt->SoLuotXem}}</td>
								<td>
									@if ($tt->NoiBat == 0) {{"Không"}} @else {{"Có"}} @endif
								</td>
								<td>{{$tt->loaitin->Ten}}</td>
								<td>{{$tt->loaitin->theloai->Ten}}</td>
								<td class="text-center">
									<a href="admin/tintuc/sua/{{$tt->id}}"><i class="fa fa-pencil"></i>&nbsp; Sửa</a>
								</td>
								<td class="text-center">
									<a href="admin/tintuc/xoa/{{$tt->id}}"><i class="fa fa-trash"></i>&nbsp; Xóa</a>
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
		$('#danhsachtintuc').DataTable()
	})
</script>
@endsection