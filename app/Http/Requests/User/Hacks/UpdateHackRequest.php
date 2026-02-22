<?php

namespace App\Http\Requests\User\Hacks;

class UpdateHackRequest extends AccessHackRequest
{
    /**
     * authorize() inherits from AccessHackRequest
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => "nullable|string|max:65535",
            'value' => "required|string|max:4294967295"
        ];
    }
}
