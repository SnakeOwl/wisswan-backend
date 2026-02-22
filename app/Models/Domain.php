<?php

namespace App\Models;

use App\Models\Scopes\OrderByName;
use App\Models\Traits\UsesStatuses;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[ScopedBy([OrderByName::class])]
class Domain extends Model
{
    use UsesStatuses;

    protected $fillable = [
        'name',
        'alias',    
        'published',
    ];


    // ==== RELATIONS ====

    public function hacks(): BelongsToMany
    {
        return $this->belongsToMany(Hack::class);
    }
    // ---- RELATIONS ----
}
