<?php

namespace App\Models;

use App\Models\Scopes\OrderByRatingDesc;
use App\Models\Traits\UsesStatuses;
use App\Observers\HacksObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[ScopedBy([OrderByRatingDesc::class]), ObservedBy(HacksObserver::class)]
class Hack extends Model
{
    use UsesStatuses;


    protected $fillable = [
        'is_global', // display the Hack on public pages
        'title', // text
        'value', // longtext
        'rating', // counter
        'ip_last_updated',
        'shared_link', // TODO: reserved. initialize.
        'status', // see App\Models\Traits\UsesStatuses

        // user_id // bounds on creating
    ];

    /**
     * Defatult values on creating
     *
     * @var array
     */
    protected $attributes = [
        'status' => '100',
    ];

    protected $with = [
        'domains'
    ];

    public function rating_plus()
    {
        $this->rating += 1;
        $this->saveQuietly();
    }

    // ==== RELATIONS ====

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function domains(): BelongsToMany
    {
        return $this->belongsToMany(Domain::class);
    }
    // ---- RELATIONS ----
}
