<?php

namespace App\Http\Requests\User\Hacks;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class AccessHackRequest extends FormRequest
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
}
