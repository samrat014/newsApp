<?php

namespace App\Http\Requests;

use App\Enums\NewsCategories;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreNewsRequest extends FormRequest
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

            // using this way so we can use different enum for future
            'category' => ['required',
                new Enum(NewsCategories::class)
            ],


            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'sometimes|mimes:jpeg,jpg,png,gif|max:4096'
        ];
    }
}
