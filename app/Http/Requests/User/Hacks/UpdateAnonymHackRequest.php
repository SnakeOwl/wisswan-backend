<?php

namespace App\Http\Requests\User\Hacks;

use App\Models\Hack;
use Illuminate\Foundation\Http\FormRequest;


class UpdateAnonymHackRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $hackId = $this->has('id') ? $this->has('id') : null;

        if ($hackId === null) // new anonymous Hack
            return true;


        $hack = Hack::where('id', $hackId)
            ->whereNull('user_id')->first('id');

        // if Hack has no bound to User, then it's anonymous created Hack
        return $hack != null;
    }

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
