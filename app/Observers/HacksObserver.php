<?php

namespace App\Observers;
use App\Models\Hack;
use Illuminate\Support\Facades\Request;

class HacksObserver
{
    public function saving(Hack $hack): void
    {
        $hack->ip_last_updated = Request::ip();
    }
}
