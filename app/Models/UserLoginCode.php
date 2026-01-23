<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class UserLoginCode extends Model
{
    const UPDATED_AT = null; // disable updated_at

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'expires_at',
        'code', // length: 8
        'user_id',
    ];


    public static function create_for_user($user_id): UserLoginCode
    {
        // generate code for login
        $code = Str::upper(Str::random(5));

        $code = UserLoginCode::create([
            'expires_at' => now()->addMinutes(15),
            'code' => $code,
            'user_id' => $user_id,
        ]);

        return $code;
    }


    // ==== RELATIONS ====
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
