<?php

namespace App\Http\Requests\Album;

use App\Models\Artist;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'artist_id' => ['exists:'.Artist::class.',id'],
            'name' => ['required','string','max:120'],
            'year' => ['required','numeric','min:1901','max:'.date('Y')],
        ];
    }
}