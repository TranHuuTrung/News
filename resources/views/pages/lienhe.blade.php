
@extends('layout.index')

@section('title')
    Liên hệ
@endsection

@section('content')
<div class="container">
  <!-- slider -->
  @include('layout.slide')
  <!-- end slide -->
  <div class="space20"></div>
  <div class="row main-left">
   @include('layout.menu')
    <div class="col-md-9">
      <div class="panel panel-default">
        <div class="panel-heading" style="background-color:#337AB7; color:white;">
          <h2 style="margin-top:0px; margin-bottom:0px;">Liên hệ</h2>
        </div>
        <div class="panel-body">
          <!-- item -->
          <h3><span class="glyphicon glyphicon-align-left"></span> Thông tin liên hệ</h3>
          <div class="break"></div>
          <h4><span class="glyphicon glyphicon-home "></span> Địa chỉ : </h4>
          <p>Hoa Khanh, Lien Chieu, Da Nang </p>
          <h4><span class="glyphicon glyphicon-envelope"></span> Email : </h4>
          <p>tranhuutrung@gmail.com </p>
          <h4><span class="glyphicon glyphicon-phone-alt"></span> Điện thoại : </h4>
          <p>0966 581 498 </p>
          <br><br>
          <h3><span class="glyphicon glyphicon-globe"></span> Bản đồ</h3>
          <div class="break"></div><br>
          <iframe src="https://www.google.com/maps/place/%C3%82u+C%C6%A1,+%C4%90%C3%A0+N%E1%BA%B5ng,+Vi%E1%BB%87t+Nam/@16.0780153,108.1191086,17z/data=!3m1!4b1!4m5!3m4!1s0x31421ededef228f1:0x945dbd325b4cbd37!8m2!3d16.0693574!4d108.1235982"
            width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

        </div>
      </div>
    </div>
  </div>
  <!-- /.row -->
</div>
@endsection