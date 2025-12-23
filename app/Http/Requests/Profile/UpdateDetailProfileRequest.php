<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDetailProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'           => ['required', 'string', 'max:255'],
            'phone'          => ['required', 'string', 'max:20'],
            'id_number'      => ['required', 'string', 'max:50'],
            'date_of_birth'  => ['required', 'date'],
            'gender'         => ['required', 'in:male,female'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'          => 'Nama lengkap wajib diisi.',
            'name.string'            => 'Nama lengkap harus berupa teks.',
            'name.max'               => 'Nama lengkap maksimal 255 karakter.',

            'phone.required'         => 'Nomor telepon wajib diisi.',
            'phone.string'           => 'Nomor telepon harus berupa teks.',
            'phone.max'              => 'Nomor telepon maksimal 20 karakter.',

            'id_number.required'     => 'Nomor KTP wajib diisi.',
            'id_number.string'       => 'Nomor KTP harus berupa teks.',
            'id_number.max'          => 'Nomor KTP maksimal 50 karakter.',

            'date_of_birth.required' => 'Tanggal lahir wajib diisi.',
            'date_of_birth.date'     => 'Format tanggal lahir tidak valid.',

            'gender.required'        => 'Jenis kelamin wajib dipilih.',
            'gender.in'              => 'Jenis kelamin yang dipilih tidak valid.',
        ];
    }
}
