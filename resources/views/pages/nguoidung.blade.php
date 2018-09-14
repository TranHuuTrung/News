@extends('layout.index') 
@section('title') Tài khoản
@endsection
 
@section('content')
<!-- Page Content -->
<div class="container">
  <!-- slider -->
  <div class="row carousel-holder">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">Thông tin tài khoản</div>
        <div class="panel-body">
            @if (count($errors) > 0)
            <div class="alert alert-danger" style="margin-top: 10px">
              @foreach ($errors->all() as $err) {{$err}} <br> @endforeach
            </div>
            @endif
            @if (session('thongbao'))
                <div class="alert alert-success">
                  {{session('thongbao')}}
                </div>
            @endif
          <form method="POST" action="nguoidung">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div>
              <label>Họ tên</label>
              <input type="text" class="form-control" value="{{$user->name}}" placeholder="Username" name="name" ">
							</div>
							<br>
							<div>
				    			<label>Email</label>
							  	<input type="email " class="form-control " disabled value="{{$user->email}}" placeholder="Email"
              name="email"" >
            </div>
            <br>
            <div>
              <input type="checkbox" class="" id="CheckChangePassword" name="CheckChangePassword">
              <label>Nhập mật khẩu</label>
              <input type="password" disabled class="form-control password" name="password" ">
							</div>
							<br>
							<div>
				    			<label>Nhập lại mật khẩu</label>
							  	<input type="password " disabled class="form-control password " name="passwordAgain "">
            </div>
            <br>
            <button type="submit" class="btn btn-success">Chỉnh sửa
							</button>

          </form>
        </div>
      </div>
    </div>
    <div class="col-md-2">
    </div>
  </div>
  <!-- end slide -->
</div>
@endsection
 
@section('script')
<script>
  $(document).ready(function() {
			$("#CheckChangePassword").change(function(){
				if ($(this).is(":checked")) {
					$(".password").removeAttr('disabled');
				} else {
					$(".password").attr("disabled", "");
				}
			});
		});
</script>
@endsection