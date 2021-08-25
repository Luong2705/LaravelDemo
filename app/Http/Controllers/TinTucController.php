<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiTin;
use App\Models\TheLoai;
use App\Models\TinTuc;
use App\Models\Comment;
class TinTucController extends Controller
{
    //
    public function getDanhSach(){
        $tintuc = TinTuc::orderBy('id', 'DESC')->get();
        return view('/admin/tintuc/danhsach',['tintuc'=>$tintuc]);
    }
    public function getThem(){
        $tintuc = TinTuc::all();
        $theloai = Theloai::all();
        $loaitin = LoaiTin::all();
        return view('/admin/tintuc/them',['theloai'=>$theloai],['loaitin'=>$loaitin]);
    }
    public function postThem(Request $request){
        $this->validate($request,
        [
            'LoaiTin'=>'required',
            'TieuDe'=> 'required|min:3|max:100|unique:TinTuc,TieuDe',
            'TomTat'=>'required',
            'NoiDung'=>'required',
            'Hinh'=>'required'
        ],
        [   
            'LoaiTin.required'=>'Bạn chưa nhập tên loại tin',
            'TomTat.required'=>'Bạn chưa nhập tóm tắt',
            'TieuDe.required'=>'Bạn chưa nhập tiêu đề',
            'TieuDe.min'=>'Tên tiêu đề phải có độ dài từ 3 cho đến 100 kí tự',
            'TieuDe.max'=>'Tên tiêu đề phải có độ dài từ 3 cho đến 100 kí tự',
            'TieuDe.unique'=>'Tiêu đề đã tồn tại',
            'NoiDung.required'=>'Bạn chưa nhập nội dung',
            'Hinh'=>'Chọn ảnh'
        ]);
        $tintuc = new TinTuc;
        $tintuc->TieuDe = $request->TieuDe;
        $tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
        $tintuc->idLoaiTin = $request->LoaiTin;
        $tintuc->TomTat = $request->TomTat;
        $tintuc->NoiDung = $request->NoiDung;
        $tintuc->NoiBat = $request->NoiBat;
        $tintuc->SoLuotXem = 0;
        if($request->hasFile('Hinh')){
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'JPG' && $duoi != 'PNG' && $duoi != 'JPEG'){
                return redirect('admin/tintuc/them')->with('loi', 'Chỉ được chọn file đuôi jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = rand()."_".$name;           
            while(file_exists('upload/tintuc/'.$Hinh)){
                $Hinh = rand()."_".$name;
            }
            $file->move("upload/tintuc",$Hinh);
            $tintuc->Hinh = $Hinh;
        }else{
            $tintuc->Hinh= "";
        } 
        $tintuc->save();
        return redirect('admin/tintuc/them')->with('thongbao', 'Thêm thành công');
    }
    public function getSua($id){
        $tintuc = TinTuc::find($id);
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
        return view('admin/tintuc/sua',['tintuc'=>$tintuc,'loaitin'=>$loaitin,'theloai'=>$theloai]);
    }
    public function postSua(Request $request, $id){
        $tintuc = TinTuc::find($id);
        $this->validate($request,
        [
            'LoaiTin'=>'required',
            'TieuDe'=> 'required|min:3|max:100|unique:TinTuc,TieuDe',
            'TomTat'=>'required',
            'NoiDung'=>'required',
        ],
        [   
            'LoaiTin.required'=>'Bạn chưa nhập tên loại tin',
            'TomTat.required'=>'Bạn chưa nhập tóm tắt',
            'TieuDe.required'=>'Bạn chưa nhập tiêu đề',
            'TieuDe.min'=>'Tên tiêu đề phải có độ dài từ 3 cho đến 100 kí tự',
            'TieuDe.max'=>'Tên tiêu đề phải có độ dài từ 3 cho đến 100 kí tự',
            'TieuDe.unique'=>'Tiêu đề đã tồn tại',
            'NoiDung.required'=>'Bạn chưa nhập nội dung',
        ]);
        $tintuc->TieuDe = $request->TieuDe;
        $tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
        $tintuc->idLoaiTin = $request->LoaiTin;
        $tintuc->TomTat = $request->TomTat;
        $tintuc->NoiDung = $request->NoiDung;
        $tintuc->NoiBat = $request->NoiBat;
        if($request->hasFile('Hinh')){
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'JPG' && $duoi != 'PNG' && $duoi != 'JPEG'){
                return redirect('admin/tintuc/them')->with('loi', 'Chỉ được chọn file đuôi jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = rand()."_".$name;           
            while(file_exists('upload/tintuc/'.$Hinh)){
                $Hinh = rand()."_".$name;
            }
            $file->move("upload/tintuc",$Hinh);
            unlink("upload/tintuc/",$tintuc->Hinh);
            $tintuc->Hinh = $Hinh;
        }
        $tintuc->save();
        return redirect('admin/tintuc/sua/'.$id )->with('thongbao', 'Sửa thành công');
    }

    public function getXoa($id){
        $tintuc = TinTuc::find($id);
        $tintuc->delete();
        return redirect('admin/tintuc/danhsach')->with('thongbao', 'Bạn đã xóa thành công');
    }
}
