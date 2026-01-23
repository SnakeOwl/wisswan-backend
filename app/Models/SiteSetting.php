<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Convenient storage for parameters that can't write to .env.
 */
class SiteSetting extends Model
{
    protected $fillable = [
        'key', /** #unique . key to find target setting. */
        'value', 
        'description', 
    ];
}
