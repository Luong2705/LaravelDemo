<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheLoai;
use App\Models\Slide;
use App\Models\Loaitin;
use App\Models\TinTuc;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    //
    function __construct(){
        $theloai =TheLoai::all();
        $slide = Slide::all();
        view()->share('slide', $slide);
        view()->share('theloai',$theloai);
       
    }
    function trangchu(){
       
        return view('pages/trangchu');
    }
    function lienhe(){
       
        return view('pages/lienhe');
    }
    function loaitin($id){
        $loaitin = Loaitin::find($id);
        $tintuc = TinTuc::where('idLoaiTin',$id)->paginate(5);
        return view('pages/loaitin',['loaitin'=>$loaitin,'tintuc'=>$tintuc]);
    }
    function tintuc($id){
        $tintuc= TinTuc::find($id);
        $tinnoibat = TinTuc::where('NoiBat',1)->take(3)->get();
        $tinlienquan = TinTuc::where('idLoaiTin',$tintuc->idLoaiTin)->take(3)->get();
        return view('pages/tintuc',['tintuc'=>$tintuc,'tinnoibat'=>$tinnoibat,'tinlienquan'=>$tinlienquan]);
    }
    function getDangnhap(){
        return view('pages/dangnhap');
    }
    function postDangnhap(Request $request){
        $remember = $request->input('remember_me');
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)){
           
            return redirect('trangchu');
        }else{
            return redirect('dangnhap')->with('thongbao','Đăng nhập không thành công');
        }
    }
    function getDangxuat(){
        Auth::logout();
        return redirect('trangchu');
    }

    function getQuen(){
        return view('pages/quen');  
    }

    function postQuen(Request $request){
        $email = $request->email;
        $checkUser = User::where('email', $email)->first();
        if(!$checkUser) return redirect('quen')->with('thongbao','Email không toàn tại');
        $code = bcrypt(md5(time() . $email));
        $checkUser->code = $code;
        $checkUser->time_code = Carbon::now();
        $checkUser->save();
       
        $url = route('resetpassword',['code'=>$checkUser->code, 'email'=>$email]);
        $data = ['route'=>$url ];
        Mail::send('pages/reset', $data, function ($message) use ($email) {
            $message->to($email,'Visitor')->subject('Lấy lại mật khẩu') ;
        });
        return redirect('quen')->with('success','Link lấy lại mật khẩu đã được vào gmail');
    }

    function getThayDoi(Request $request){
        $code = $request->code;
        $email = $request->email;
        $checkUser = User::where([
            'code' => $code,
            'email' => $email
        ])->first();
        if(!$checkUser) return redirect('quen')->with('again','Lỗi xử lý vui lòng gửi lại gmail');
        return view('pages/thaydoi');
       
    }
    function postThayDoi(Request $request) { 
      
        $this->validate($request,[
            'password'=>'required|min:8|max:32',
            'passwordAgain'=>'required|same:password'
        ],[
            'password.required'=>'Bạn chưa nhập password',
            'password.min'=>'Mật khẩu có ít nhất 8 kí tự, không dài quá 32 kí tự',
            'password.max'=>'Mật khẩu có ít nhất 8 kí tự, không dài quá 32 kí tự',
            'passwordAgain.required'=>"Bạn chưa nhập lại mật khẩu",
            'passwordAgain.same'=>"Mật khẩu không khớp"
        ]);
        if($request->password){
            $code = $request->code;
            $email = $request->email;
            $checkUser = User::where([
                'code' => $code,
                'email' => $email
            ])->first();
            if(!$checkUser) return redirect('quen')->with('again','Lỗi xử lý vui lòng gửi lại gmail');
            $checkUser->password = bcrypt($request->password);
            $checkUser->save();
            return redirect('dangnhap')->with('thongbao3','Mật khẩu đổi thành công, vui lòng đăng nhập lại');
            }    
    }

    function getNguoidung(){
        $user =Auth::user();
        return view('pages/nguoidung',['nguoidung'=>$user]);
    }
    function postNguoidung(Request $request){
        $this->validate($request,[
            'name'=>'required|min:3|max:32',
        ],[
            'name.required'=>'Bạn chưa nhập tên đăng nhập',
            'name.min'=>'Tên đăng nhập có ít nhất 3 kí tự, không dài quá 32 kí tự',
            'name.max'=>'Tên đăng nhập có ít nhất 3 kí tự, không dài quá 32 kí tự',
        ]);
        $user = Auth::user();
        
        $user->name = $request->name;
        if($request->checkpassword=="on"){
            
            $this->validate($request,[
                'password'=>'required|min:8|max:32',
                'passwordAgain'=>'required|same:password'
            ],[
                'password.required'=>'Bạn chưa nhập password',
                'password.min'=>'Mật khẩu có ít nhất 8 kí tự, không dài quá 32 kí tự',
                'password.max'=>'Mật khẩu có ít nhất 8 kí tự, không dài quá 32 kí tự',
                'passwordAgain.required'=>"Bạn chưa nhập lại mật khẩu",
                'passwordAgain.same'=>"Mật khẩu không khớp"
            ]);
            $user->password= bcrypt($request->password);
        }
        $user->save();
        return redirect('nguoidung')->with('thongbao','Sửa thành công');
    }
    function getDangky(){
        return view('pages/dangky');
    }
    function postDangky(Request $request){
        $this->validate($request,[
            'name'=>'required|min:3|max:32',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8|max:32',
            'passwordAgain'=>'required|same:password'
        ],[
            'name.required'=>'Bạn chưa nhập tên đăng nhập',
            'name.min'=>'Tên đăng nhập có ít nhất 3 kí tự, không dài quá 32 kí tự',
            'name.max'=>'Tên đăng nhập có ít nhất 3 kí tự, không dài quá 32 kí tự',
            'email.email'=>'Bạn chưa nhập đúng dạng email',
            'email.required'=>'Bạn chưa nhập email',
            'email.unique'=>'Email đã tồn tại',
            'password.required'=>'Bạn chưa nhập password',
            'password.min'=>'Mật khẩu có ít nhất 8 kí tự, không dài quá 32 kí tự',
            'password.max'=>'Mật khẩu có ít nhất 8 kí tự, không dài quá 32 kí tự',
            'passwordAgain.required'=>"Bạn chưa nhập lại mật khẩu",
            'passwordAgain.same'=>"Mật khẩu không khớp"
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->quyen = 0;
        $user->save();
        return redirect('dangnhap')->with('thongbao1','Nhập tài khoản');
    }

    function timkiem(Request $request){
        $tukhoa = $request->tukhoa;
        $tintuc = TinTuc::where('TieuDe','like',"%$tukhoa%")->orWhere('TomTat','like',"%$tukhoa%")->orWhere('NoiDung','like',"%$tukhoa%")->paginate(5);
        return view('pages/timkiem',['tintuc'=>$tintuc,'tukhoa'=>$tukhoa]);
    }
    function chinhsach(){
        return view('pages/chinhsach');
    }
}


