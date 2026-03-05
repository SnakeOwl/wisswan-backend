<?php

namespace App\Http\Requests\User\Hacks;

class UpdateAnonymHackRequest extends AccessHackRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'nullable|exists:hacks.id|numeric',
            'title' => "nullable|string|max:65535",
            'value' => "required|string|max:4294967295",
            'domains' => "array|nullable",
            'domains.*.id' => 'nullable|integer',
            'domains.*.name' => 'required|string',
        ];
    }
}
