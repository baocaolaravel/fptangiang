<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContactRequest extends Request {

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
            'txtName' => 'required|unique:contacts,name',
            'txtEmail' => 'required|unique:contacts,email',
            'txtTelno' => 'required',

        ];
	}
    public function messages()
    {
        return [
            'txtName.required' => 'Vui lòng nhập tên khách hàng',
            'txtName.unique' => 'Tên khách hàng đã tồn tại',
            'txtEmail.required' => 'Vui lòng nhập email khách hàng',
            'txtEmail.unique' => 'Email này đã được sử dụng',
            'txtTelno.required' => 'Vui lòng nhập số điện thoại khách hàng'
        ];
    }

}
