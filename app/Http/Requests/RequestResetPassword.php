<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestResetPassword extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'password'=>'required|min:8|max:32',
            'passwordAgain'=>'required|same:password'
        ];
    }
    public function message()
    {
        return [
                'password.required'=>'Bạn chưa nhập password',
                'password.min'=>'Mật khẩu có ít nhất 8 kí tự, không dài quá 32 kí tự',
                'password.max'=>'Mật khẩu có ít nhất 8 kí tự, không dài quá 32 kí tự',
                'passwordAgain.required'=>"Bạn chưa nhập lại mật khẩu",
                'passwordAgain.same'=>"Mật khẩu không khớp"
        ];
    }
}
