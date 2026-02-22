<?php

namespace App\Http\Controllers\Feed;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use App\Models\Hack;
use Illuminate\Http\Request;

class GetHacksController extends Controller
{
    public function __invoke(Request $request)
    {
        $filter_domains = $request->has('domains')? $request->get('domains'): null;

        $hacks = Hack::where('is_global', 1);

        if ($filter_domains != null) {
            $domains_ids = Domain::whereIn('id', $filter_domains)
                ->OrWhere(function ($query) use ($filter_domains) {
                    $query->whereIn('alias', $filter_domains);
                })
                ->pluck('id');


            foreach ($domains_ids as $domainId) {
                $hacks->whereHas('domains', function ($query) use ($domainId) {
                    $query->where('domains.id', $domainId);
                });
            }
        }


        return $hacks->paginate(50);
    }
}
