<?php

namespace App\Models\Traits;

/**
 * Description and implementation of statuses.
 */
trait UsesStatuses
{
    /**
     * Array of defined statuses.
     * 0 - 99 - reserved
     * 100 - 199 - information statuses : records can NOT be public
     * 200 - 299 - success statuses : records can be public
     * 300 - 399 - reserved
     * 400 - 499 - user errors statuses : records can NOT be public
     * 500 - 599 - server errors statuses : records can NOT be public. Need to check.
     * @var array
     */
    static $STATUSES_ARRAY = [
        0, // DB default
        
        100, // 'private' - need check to publish
        110, // 'checking' - need check to publish

        200, // 'checked'
        201, // 'checked but private' - has opportunity to publish without checking.
        250, // 'some restricted' - Content is prohibited in some countries. Need check
        
        400, // 'restricted by terms of use' - the user has violated the platform's terms of use.
        410, // 'restricted by request from law enforcement' - Law enforcement agencies may request that content be blocked
        
        500, // maybe was an error on our server side processing... jobs, cron-schedule or another.
    ];
}