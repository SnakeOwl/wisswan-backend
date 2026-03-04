<?php

namespace App\Http\Controllers\User\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\User\UpdateUserRequest;
use App\Models\User;

class UpdateUserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateUserRequest $request, User $user)
    {
        $params = $request->validated();

        $user->update($params);

        if (isset($params['access']) && $user->access != $params['access']) {
            $user->setAccess($params['access']);
        }

        return $user;
    }
}
