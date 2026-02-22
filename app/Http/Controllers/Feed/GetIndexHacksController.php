<?php

namespace App\Http\Controllers\Feed;

use App\Http\Controllers\Controller;
use App\Models\Hack;
use Illuminate\Http\Request;

class GetIndexHacksController extends Controller
{
    public function __invoke(Request $request)
    {
        return Hack::where('is_global', 1)->take(8)->get();
    }
}
