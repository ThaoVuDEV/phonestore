<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Change to true to allow the request, or implement proper authorization logic
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'agree_terms' => 'required|accepted',
        ];
    }

    /**
     * Get the custom validation messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên',
            'email.required' => 'Vui lòng nhập email',
            'email.email' =>    'Email không hợp lệ',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Vui lòng nhập ít nhất 8 ký tự',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp',
            'agree_terms.required' => 'Bạn phải chấp nhận điều khoản',
        ];
    }
}
