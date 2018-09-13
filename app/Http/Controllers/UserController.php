<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
class UserController extends Controller
{
    public function getDangnhapAdmin() {
        return view('admin.login');
    }

    public function postDangnhapAdmin(Request $request) {
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

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('admin/trangchu');
        } else {
            return redirect('admin/dangnhap')->with('thongbao', 'Đăng nhập không thành công!');
        }
    }

    public function getDangXuatAdmin() {
        Auth::logout();
        return redirect('admin/dangnhap');
    }

    public function getInfoAdmin() {
        return view('admin.trangchu.trangchu');
    }
    //
    public function getDanhSach() {
        $users = User::all();
        return view('admin.user.danhsach', ['users'=>$users]);
    }

    public function getThem() {
        return view('admin.user.them');
    }

    public function postThem(Request $request) {
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
        $user->quyen = $request->quyen;
        $user->save();
        return redirect('admin/user/them')->with('thongbao', 'Thêm người dùng thành công!');
    }

    public function getSua($id) {
        $user =  User::find($id);
        return view('admin.user.sua', ['user'=>$user]);
    }

    public function postSua(Request $request, $id) {
        $this->validate($request, [
            'name'=> 'required|min:3',
        ], [
            'name.required'=> 'Bạn chưa nhập họ tên',
            'name.min'=> 'Tên phải có ít nhất 3 kí tự',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->quyen = $request->quyen;

        if($request->changePassword == 'on') {
            $this->validate($request, [
                'password'=> 'required|min:8|max:32',
                'passwordAgain'=> 'required|same:password',
            ], 
            [
                'password.required'=> 'Bạn chưa nhập mật khẩu',
                'password.min'=> 'Mật khẩu có độ dài từ 8 -32 kí tự',
                'password.max'=> 'Mật khẩu có độ dài từ 8 -32 kí tự',
                'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
                'passwordAgain.same' => 'Không trùng với mật khẩu',
            ]);
            $user->password = bcrypt($request->password);
        }

        $user->save();
        return redirect('admin/user/sua/'.$id)->with('thongbao', 'Chỉnh sửa thông tin người dùng thành công!');
    }

    public function getXoa($id) {
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user/danhsach')->with('thongbao', 'Đã xóa người dùng thành công!');
    }
}
