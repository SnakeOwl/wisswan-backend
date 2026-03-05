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

        // if Hack has no bound to User, then it's anonymous created Hack
        return $hack->user_id === null
            || Gate::forUser($user)->allows('edit-model', $hack);
    }
}
