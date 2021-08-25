<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


use App\Models\User;
class UserController extends Controller
{
    //
    public function getDanhSach(){
        $user = User::all();
        return view('admin/user/danhsach',['user'=>$user]);
    }
    public function getThem(){
        return view('admin/user/them');
    }
    public function postThem(Request $request){
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
       $user->quyen = $request->quyen;
       $user->save();
       return redirect('admin/user/them')->with('thongbao','Thêm thành công');
    }
    public function getSua($id){
        $user = User::find($id);
        return view('admin/user/sua',['user'=>$user]);
    }
    public function postSua(Request $request, $id){

        $this->validate($request,[
            'name'=>'required|min:3|max:32',
        ],[
            'name.required'=>'Bạn chưa nhập tên đăng nhập',
            'name.min'=>'Tên đăng nhập có ít nhất 3 kí tự, không dài quá 32 kí tự',
            'name.max'=>'Tên đăng nhập có ít nhất 3 kí tự, không dài quá 32 kí tự',
        ]);
        $user= User::find($id);
        $user->name = $request->name;
        $user->quyen = $request->quyen;
        if($request->changePassword=="on"){
            
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
        return redirect('admin/user/sua/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getXoa($id){
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user/danhsach')->with('thongbao','Xóa thành công');
    }

    public function getdangnhapAdmin(){
        return view('admin/login');
    }

    public function postdangnhapAdmin(Request $request){
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required|min:8|max:32',

        ],[
            'email.required'=>'Bạn chưa nhập email',
            'password.required'=>'Bạn chưa nhập password',
            'password.min'=>'Mật khẩu có ít nhất 8 kí tự, không dài quá 32 kí tự',
            'password.max'=>'Mật khẩu có ít nhất 8 kí tự, không dài quá 32 kí tự'
        ]);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('admin/theloai/danhsach');
        }else{
            return redirect('admin/login')->with('thongbao','Đăng nhập không thành công');
        }
    }

    public function getdangxuatAdmin(){
        Auth::logout();
        return redirect('admin/login');
    }
}
