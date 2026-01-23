<?php

namespace App\Http\Controllers\User\Login;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Login\LoginCodeRequest;
use App\Http\Requests\User\Login\LoginRequest;
use App\Models\User;
use App\Models\UserLoginCode;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    /**
     * First request to login.
     */
    public function login(LoginRequest $request)
    {
        $params = $request->validated();

        $user = User::withTrashed()->where("email", $params)->first();
        $params["last_activity_at"] = now();


        if ($user === null) {
            $user = new User();
            $user->email = $params['email'];
            $user->last_activity_at = now();
            $user->save();
            $user->refresh(); // get id from base
        } else {
            $user->update($params);
        }


        // check on delete
        if ($user->trashed())
            return response(json_encode(["errors" => ['email' => 'Пользователь удалён']]), 200);


        $login_code = UserLoginCode::create_for_user($user->id);


        Mail::send('emails.auth.login-code', ['code' => $login_code->code], function ($m) use ($request) {
            $m->to($request->input('email'))->subject(env('APP_NAME') . ' код для входа');
        });


        return response(json_encode(["success" => "Код отправлен на почту"]), 200);
    }


    /**
     * Checking code and autheintification.
     */
    public function check_code(LoginCodeRequest $request)
    {
        $params = $request->validated();

        $user = User::where('email', $params['email'])->first();

        if ($user === null)
            return ['errors' => ['email' => 'Пользователя с таким email не найдено']];


        $code = $user->auth_code()->where('code', $params['code'])
            // ->where('expires_at', '<', now()->addMinutes(15))
            ->first();


        if ($code === null)
            return ['errors' => ['code' => 'Неверный код']];


        if ($user->email_verified_at === null) {
            $user->update(["email_verified_at" => now()]); // email verification
        }


        $token = $user->createToken("main")->plainTextToken;


        return response(['user' => $user, 'token' => $token]);
    }
}
