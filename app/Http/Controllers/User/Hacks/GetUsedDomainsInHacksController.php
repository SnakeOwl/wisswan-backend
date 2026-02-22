<?php

namespace App\Http\Controllers\User\Hacks;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use Illuminate\Http\Request;

class GetUsedDomainsInHacksController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = $request->user();

        $domains = Domain::whereHas('hacks', function ($query) use ($user) {
            $query->withoutGlobalScopes()
                ->where('user_id', $user->id);
        })->distinct()->get();


        return $domains;
    }
}
