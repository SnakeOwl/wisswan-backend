<?php

namespace App\Http\Requests\User\Hacks;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateHackRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();
        $hack = $this->route("hack");
        return Gate::forUser($user)->allows('edit-model', $hack);
    }

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
