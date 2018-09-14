<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\TheLoai;
use App\Slide;
use App\LoaiTin;
use App\TinTuc;
use App\User;
class PagesController extends Controller
{
    function __construct(){
        $theloai = TheLoai::all();
        $slide = Slide::all();
        view()->share('theloai', $theloai);
        view()->share('slide', $slide);
    }
    
    function trangchu() {
        return view('pages.trangchu');
    }

    function lienhe() {
        return view('pages.lienhe');
    }

    function loaitin($id) {
        $loaitin = LoaiTin::find($id);
        $tintuc = TinTuc::where('idLoaiTin', $id)->paginate(5);
        return view('pages.loaitin', ['loaitin'=>$loaitin, 'tintuc'=>$tintuc]);
    }

    function tintuc($id) {
        $tintuc = TinTuc::find($id);
        $tinnoibat = TinTuc::where('NoiBat', 1)->take(4)->get();
        $tinlienquan = TinTuc::where('idLoaiTin', $tintuc->idLoaiTin)->take(4)->get();
        return view('pages.tintuc', ['tintuc'=>$tintuc, 'tinnoibat'=> $tinnoibat, 'tinlienquan'=>$tinlienquan]);
    }

    function getDangNhap() {
        return view('pages.dangnhap');
    }

    function postDangNhap(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password'=> 'required|min:8|max:32'
        ], [
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Không đúng định dạng email',
            'password.required'=> 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu có độ dài 8-32 kí tự',
            'password.max'=> 'Mật khẩu có độ dài 8-32 kí tự',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('trangchu');
        } else {
            return redirect('dangnhap')->with('thongbao', 'Đăng nhập không thành công!');
        }
        
    }

    function getDangXuat() {
        Auth::logout();
        return redirect('trangchu');
    }

    function getNguoiDung() {
        $user = Auth::user();
        return view('pages.nguoidung', ['user'=>$user]);
    }

    function postNguoiDung(Request $request) {
        $this->validate($request, [
            'name'=> 'required|min:3',
        ],[
            'name.required'=> 'Bạn chưa nhập họ tên',
            'name.min'=> 'Tên phải có ít nhất 3 kí tự',
        ]);
        $user = Auth::user();
        $user->name = $request->name;

        if ($request->CheckChangePassword == 'on') {
            $this->validate($request, [
                'email'=> 'required|email|unique:users,email',
                'password'=> 'required|min:8|max:32',
                'passwordAgain'=> 'required|same:password',
            ],[
                'email.required'=> 'Bạn chưa nhập email',
                'email.email'=> 'Email không đúng',
                'email.unique'=> 'Email đã tồn tại',
                'password.required'=> 'Bạn chưa nhập mật khẩu',
                'password.min'=> 'Mật khẩu có độ dài từ 8 -32 kí tự',
                'password.max'=> 'Mật khẩu có độ dài từ 8 -32 kí tự',
                'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
                'passwordAgain.same' => 'Không trùng với mật khẩu',
            ]);
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect('nguoidung')->with('thongbao', 'Thay đổi thành công');
    }

    function getDangKi() {
        return view('pages.dangki');
    }

    function postDangKi(Request $request) {
        $this->validate($request, [
            'name'=> 'required|min:3',
            'email'=> 'required|email|unique:users,email',
            'password'=> 'required|min:8|max:32',
            'passwordAgain'=> 'required|same:password',
        ], 
        [
            'name.required'=> 'Bạn chưa nhập họ tên',
            'name.min'=> 'Tên phải có ít nhất 3 kí tự',
            'email.required'=> 'Bạn chưa nhập email',
            'email.email'=> 'Email không đúng',
            'email.unique'=> 'Email đã tồn tại',
            'password.required'=> 'Bạn chưa nhập mật khẩu',
            'password.min'=> 'Mật khẩu có độ dài từ 8 -32 kí tự',
            'password.max'=> 'Mật khẩu có độ dài từ 8 -32 kí tự',
            'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same' => 'Không trùng với mật khẩu',
        ]);
        
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->quyen = 0;
        $user->save();
        
        return redirect('dangki')->with('thongbao', 'Chúc mừng bạn đã đăng kí thành công!');
    }

    function getTimkiem(Request $request){
        $tukhoa = $request->tukhoa;
        $tintuc = TinTuc::where('TieuDe', 'like', "%$tukhoa%")->orWhere('TomTat', 'like', "%$tukhoa%")->orWhere('NoiDung', 'like', "%$tukhoa%")->take(30)->paginate(5);
        return view('pages.timkiem', ['tintuc'=>$tintuc, 'tukhoa'=>$tukhoa]);
    }
  
}
