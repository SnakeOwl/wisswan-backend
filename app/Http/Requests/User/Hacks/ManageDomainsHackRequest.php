<?php

namespace App\Http\Requests\User\Hacks;

class ManageDomainsHackRequest extends AccessHackRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // anonimous hack has no user_id
        return $this->route("hack")->user_id == null;
    }


    public function rules(): array
    {
        return [
            'domains' => "array|nullable",
            'domains.*.id' => 'nullable|integer',
            'domains.*.name' => 'required|string',
        ];
    }
}
