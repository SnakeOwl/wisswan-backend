<?php

namespace App\Http\Requests\User\Hacks;

use Illuminate\Foundation\Http\FormRequest;

class CreateHackRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => "nullable|string|max:65535",
            'group' => "nullable|string|max:255",
            'domen' => "nullable|string|max:255",
            'subdomen' => "nullable|string|max:255",
            'value' => "required|string|max:4294967295"
        ];
    }
}
