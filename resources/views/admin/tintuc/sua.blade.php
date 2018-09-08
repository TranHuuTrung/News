@extends('admin.layout.index') 
@section('content')
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Thêm tin tức</h3>
				</div>
				<!-- /.box-header -->
				@if (count($errors) > 0)
				<div class="alert alert-danger alert-dismissible">
					@foreach ($errors->all() as $err) {{$err}} <br> @endforeach
				</div>
				@endif @if (session('thongbao'))
				<div class="alert alert-success alert-dismissible">
					{{session('thongbao')}}
				</div>
				@endif @if (session('loi'))
				<div class="alert alert-danger alert-dismissible">
					{{session('loi')}}
				</div>
				@endif
				<!-- form start -->
				<form role="form" action="admin/tintuc/sua/{{$tintuc->id}}" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{csrf_token()}}" />
					<div class="box-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Thể loại</label>
									<select class="form-control select2" name="TheLoai" id="TheLoai" style="width: 100%;">
										@foreach ($theloai as $tl)
												<option 
													@if ($tintuc->loaitin->theloai->id == $tl->id)
															{{"selected"}}
													@endif
													value="{{$tl->id}}"
												>{{$tl->Ten}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<!-- /.col-md-6 -->
							<div class="col-md-6">
								<div class="form-group">
									<label>Loại tin</label>
									<select class="form-control select2" name="LoaiTin" id="LoaiTin" style="width: 100%;">
										@foreach ($loaitin as $lt)
												<option 
													@if ($tintuc->loaitin->id == $lt->id)
															{{"selected"}}
													@endif
													value="{{$lt->id}}"
												>{{$lt->Ten}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<!-- /.col-md-6 -->
						</div>
						<!-- /.row -->
						<div class="form-group">
							<label>Tiêu đề</label>
							<input type="text" name="TieuDe" value="{{$tintuc->TieuDe}}" class="form-control" placeholder="Nhập tiêu đề tin tức" />
						</div>
						<div class="form-group">
							<label>Tóm tắt</label>
							<textarea id="TomTat" name="TomTat" rows="10" cols="80" placeholder="Nhập tóm tắt tin tức">{{$tintuc->TomTat}}</textarea>
						</div>
						<div class="form-group">
							<label>Nội dung</label>
							<textarea id="NoiDung" name="NoiDung" rows="10" cols="80" placeholder="Nhập nội dung tin tức">{{$tintuc->NoiDung}}</textarea>
						</div>
						<div class="form-group">
							<label>Hình đại diện</label>
							<p><img width="200px" src="upload/tintuc/{{$tintuc->Hinh}}" alt=""></p>
							<input type="file" name="Hinh" />
						</div>
						<div class="form-group">
							<label>Đánh dấu là tin nổi bật</label>&nbsp;
							<label class="radio-inline">
								<input type="radio" name="NoiBat" value="0" 
									@if ($tintuc->NoiBat === 0) 
											{{"checked"}}
									@endif
								>
								Không
							</label>
							<label class="radio-inline">
								<input type="radio" name="NoiBat" value="1" 
								@if ($tintuc->NoiBat === 1) 
									{{"checked"}}
								@endif
								>
								Có
							</label>
						</div>
					</div>
					<!-- /.box-body -->
					<div class="box-footer">
						<button type="reset" class="btn btn-default btn-sm">Làm mới</button>
						<button type="submit" class="btn btn-success btn-sm">Sửa</button>
					</div>
				</form>
			</div>
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Danh sách bình luận</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="danhsachbinhluan" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>ID</th>
								<th>Người dùng</th>
								<th>Nội dung</th>
								<th>Ngày đăng</th>
								<th>Xóa</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($tintuc->comment as $cm)
							<tr>
								<td>{{$cm->id}}</td>
								<td>{{$cm->user->name}}</td>
								<td>{!!$cm->NoiDung!!}</td>
								<td>{{$cm->created_at}}</td>
								<td class="text-center">
								<a href="admin/comment/xoa/{{$tintuc->id}}/{{$cm->id}}"><i class="fa fa-trash"></i>&nbsp; Xóa</a>
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
	$(document).ready(function () {
				CKEDITOR.replace('TomTat');
				CKEDITOR.replace('NoiDung');
				$("#TheLoai").change(function () {
					var idTheLoai = $(this).val();
					$.get('admin/ajax/loaitin/'+idTheLoai, function (data) {
						$("#LoaiTin").html(data);
					});
				});
		});
	$(function () {
		$('#danhsachbinhluan').DataTable()
	})
</script>
@endsection