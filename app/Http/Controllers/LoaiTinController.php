<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiTin;
use App\Models\TheLoai;
class LoaiTinController extends Controller
{
    //
    public function getDanhSach(){
        $loaitin = LoaiTin::all();
        return view('/admin/loaitin/danhsach',['loaitin'=>$loaitin]);
    }
    public function getThem(){
        $theloai = TheLoai::all();
        return view('/admin/loaitin/them',['theloai'=>$theloai]);
    }
    public function postThem(Request $request){
        $this->validate($request,
        [
            'Ten'=> 'required|min:3|max:100|unique:LoaiTin,Ten'
        ],
        [   
            'Ten.required'=>'Bạn chưa nhập tên loại tin',
            'Ten.min'=>'Tên loại tin phải có độ dài từ 3 cho đến 100 kí tự',
            'Ten.max'=>'Tên loại tin phải có độ dài từ 3 cho đến 100 kí tự',
            'Ten.unique'=>'Tên thể loại đã tồn tại'
        ]);
        $loaitin = new LoaiTin;
        $loaitin->Ten = $request->Ten;
        $loaitin->TenKhongDau = changeTitle($request->Ten);
        $loaitin->idTheLoai = $request->TheLoai;
        $loaitin->save();
        return redirect('admin/loaitin/them')->with('thongbao', 'Thêm thành công');
    }
    public function getSua($id){
        $loaitin = LoaiTin::find($id);
        $theloai = Theloai::all();
        return view('admin/loaitin/sua',['loaitin'=>$loaitin],['theloai'=>$theloai]);
    }
    public function postSua(Request $request, $id){
        $loaitin = LoaiTin::find($id);
        $this->validate($request, 
        [
            'Ten'=>'required|unique:LoaiTin,Ten|min:3|max:100'
        ],
        [
            'Ten.required'=>'Bạn chưa nhập tên thể loại',
            'Ten.min'=>'Tên thể loại phải có độ dài từ 3 cho đến 100 kí tự',
            'Ten.max'=>'Tên thể loại phải có độ dài từ 3 cho đến 100 kí tự',
            'Ten.unique'=>'Tên thể loại đã tồn tại'
        ]);
        $loaitin->Ten = $request->Ten;
        $loaitin->TenKhongDau = changeTitle($request->Ten);
        $loaitin->idTheLoai = $request->TheLoai;
        $loaitin->save();
        return redirect('admin/loaitin/sua/'.$id )->with('thongbao', 'Sửa thành công');
    }

    public function getXoa($id){
        $loaitin = LoaiTin::find($id);
        $loaitin->delete();
        return redirect('admin/loaitin/danhsach')->with('thongbao', 'Bạn đã xóa thành công');
    }
}
