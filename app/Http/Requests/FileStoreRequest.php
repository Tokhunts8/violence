<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileStoreRequest extends FormRequest
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
            'parent_id' => 'required|integer',
            'order'     => 'required|integer',
            'file'      => 'required|mimes:jpeg,png,bmp,gif,svg,mp4,qt',
            'eFile'     => 'required|mimes:jpeg,png,bmp,gif,svg,mp4,qt',
        ];
    }
}
