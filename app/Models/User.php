<?php

namespace App\Models;

use App\Models\Traits\UserPrivileges;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens, SoftDeletes, UserPrivileges;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'deleted_message',
        // 'avatar', // not used, maybe should delete
        'name',
        // 'email', // change email via function TODO: write this function (process to change email to)
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'deleted_message'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            // 'email_verified_at' => 'datetime',
        ];
    }



    // ==== RELATIONS ====

    public function hacks(): HasMany
    {
        return $this->hasMany(Hack::class);
    }

    // hasMany in fact, but not for this functional.
    public function auth_code(): HasOne
    {
        return $this->hasOne(UserLoginCode::class)->ofMany([
            'id' => 'max'
        ], function (Builder $query) {
            $query->where('expires_at', '<', now()->addMinutes(15));
        });
    }


    // ---- RELATIONS ----
}
