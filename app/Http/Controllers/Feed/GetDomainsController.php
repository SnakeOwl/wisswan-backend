<?php

namespace App\Http\Controllers\Feed;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use Illuminate\Http\Request;

class GetDomainsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return Domain::where('published', 1)->get();
    }
}
