<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class nilaiRequest extends FormRequest
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
        // sengaja seperti ini karena tidak bisa di loop jika ada yang bisa mohon bantu loop
        for ($i=0; $i <=50 ; $i++) { 
                return [
                'aspek'.$i => 'required',
                'nilai.*' => 'required',
            ];
            }
    }
    public function messages()
    {
        for ($i=0; $i <=50 ; $i++) { 
            return [
            'aspek'.$i.".required' => 'Aspek tidak boleh kosong",
            'nilai' => 'required',

        ];
        }
    }
}
