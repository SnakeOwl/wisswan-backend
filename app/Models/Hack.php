<?php

namespace App\Models;

use App\Models\Traits\UsesStatuses;
use Illuminate\Database\Eloquent\Model;

class Hack extends Model
{
    use UsesStatuses;


    protected $fillable = [
        'title', 
        'domen', 
        'subdomen',
        'group', 
        'is_global', // display the Hack on public pages
        'value',
        'rating', // counter
        'ip_last_updated', 
        'shared_link', // TODO: reserved. initialize.
        'status', // see App\Models\Traits\UsesStatuses

        // user_id
    ];
            
}
