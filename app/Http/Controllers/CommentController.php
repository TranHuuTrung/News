<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\TinTuc;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    public function getXoa($idTinTuc, $id) {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect('admin/tintuc/sua/'.$idTinTuc)->with('thongbao', 'Xóa comment thành công!');
    }

    function postComment($id, Request $request) {
        $idTinTuc = $id;
        $tintuc = TinTuc::find($id);
        $comment = new Comment;
        $comment->idTinTuc = $idTinTuc;
        $comment->idUser = Auth::user()->id;
        $comment->NoiDung = $request->noidung;
        $comment->save();

        return redirect("tintuc/$id/".$tintuc->TieuDeKhongDau.".html")->with('thongbao', 'Viết bình luận thành công');
    }
}
