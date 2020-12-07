<?php

namespace App\Http\Requests\Band;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AlbumRequest extends FormRequest
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
            'band' => ['requierd', Rule::unique('albums')->where(function($query) {
                return $query->where('band_id', $this->band);
            })],
            'name' => 'required',
            'year' => 'required',
        ];
    }
}
