<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
use App\Comment;

class TinTucController extends Controller
{
    //
    public function getDanhSach() {
        // $tintuc = TinTuc::orderBy('id', 'DESC')->get();
        $tintuc = TinTuc::all();
        return view('admin.tintuc.danhsach', ['tintuc'=>$tintuc]);
    }

    public function getThem() {
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
        return view('admin.tintuc.them', ['theloai'=>$theloai, 'loaitin'=>$loaitin]);
    }

    public function postThem(Request $request) {
        $this->validate($request, [
            'LoaiTin'=> 'required',
            'TieuDe' => 'required|unique:TinTuc,TieuDe|min:3',
            'TomTat'=> 'required',
            'NoiDung'=> 'required',
            // 'Hinh'=>'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ], 
        [
            'LoaiTin.required'=> 'Bạn chưa chọn loại tin',
            'TieuDe.required'=> 'Bạn chưa nhập tiêu đề',
            'TieuDe.unique'=> 'Tiêu đề đã tồn tại',
            'TieuDe.min'=> 'Tiêu đề có độ dài ít nhất 3 kí tự',
            'TomTat.required'=> 'Bạn chưa nhập tóm tắt',
            'NoiDung.required'=> 'Bạn chưa nhập nội dung',
            // 'Hinh.image'=> 'Bạn phải chọn hình ảnh',
            // 'Hinh.mimes'=> 'Bạn phải nhập đúng định dạng ảnh jpg, png, jpeg',
            // 'Hinh.max'=> 'Dung lượng quá lớn',
        ]);
            
        $tintuc = new TinTuc;
        $tintuc->TieuDe = $request->TieuDe;
        $tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
        $tintuc->TomTat = $request->TomTat;
        $tintuc->NoiDung = $request->NoiDung;
        $tintuc->idLoaiTin = $request->LoaiTin;
        $tintuc->SoLuotXem = 0;
        $tintuc->NoiBat = $request->NoiBat;

        if($request->hasFile('Hinh')) {
            // dd('hi');
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect('admin/tintuc/them')->with('loi', 'Bạn phải nhập đúng định dạng ảnh jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str_random(8)."_".$name;
            while (file_exists("upload/tintuc/".$Hinh)) {
                $Hinh = str_random(8)."_".$name;
            }
            $file->move("upload/tintuc", $Hinh);
            $tintuc->Hinh = $Hinh;
        } else {
            $tintuc->Hinh = "";
        }
        $tintuc->save();
        return redirect('admin/tintuc/them')->with('thongbao', 'Thêm tin tức thành công!');
    }

    public function getSua($id) {
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
        $tintuc = TinTuc::find($id);
        return view('admin.tintuc.sua', ['tintuc'=>$tintuc, 'theloai'=>$theloai, 'loaitin'=>$loaitin]);
    }

    public function postSua(Request $request, $id) {
        $tintuc = TinTuc::find($id);
        $this->validate($request, [
            'LoaiTin'=> 'required',
            'TieuDe' => 'required|min:3',
            'TomTat'=> 'required',
            'NoiDung'=> 'required',
        ], 
        [
            'LoaiTin.required'=> 'Bạn chưa chọn loại tin',
            'TieuDe.required'=> 'Bạn chưa nhập tiêu đề',
            'TieuDe.min'=> 'Tiêu đề có độ dài ít nhất 3 kí tự',
            'TomTat.required'=> 'Bạn chưa nhập tóm tắt',
            'NoiDung.required'=> 'Bạn chưa nhập nội dung',
        ]);

        $tintuc->TieuDe = $request->TieuDe;
        $tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
        $tintuc->TomTat = $request->TomTat;
        $tintuc->NoiDung = $request->NoiDung;
        $tintuc->idLoaiTin = $request->LoaiTin;
        $tintuc->NoiBat = $request->NoiBat;

        if($request->hasFile('Hinh')) {
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect('admin/tintuc/them')->with('loi', 'Bạn phải nhập đúng định dạng ảnh jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str_random(8)."_".$name;
            while (file_exists("upload/tintuc/".$Hinh)) {
                $Hinh = str_random(8)."_".$name;
            }
            $file->move("upload/tintuc", $Hinh);
            unlink("upload/tintuc/".$tintuc->Hinh);
            $tintuc->Hinh = $Hinh;
        } 
        $tintuc->save();
        return redirect('admin/tintuc/sua/'.$id)->with('thongbao', 'Chỉnh sửa thành công!');
    }

    public function getXoa($id) {
        $tintuc = TinTuc::find($id);
        $tintuc->delete();

        return redirect('admin/tintuc/danhsach')->with('thongbao', 'Bạn đã xóa thành công');
    }

}
