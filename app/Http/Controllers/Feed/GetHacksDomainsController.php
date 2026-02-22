<?php

namespace App\Http\Controllers\Feed;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use Illuminate\Http\Request;

class GetHacksDomainsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return Domain::where('published', 1)
            ->whereHas('hacks', function ($query) {
                $query->where('is_global', 1);
            }, '>', 0)
            ->get();
    }
}
