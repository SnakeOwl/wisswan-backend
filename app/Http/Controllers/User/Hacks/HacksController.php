<?php

namespace App\Http\Controllers\User\Hacks;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Hacks\AccessHackRequest;
use App\Http\Requests\User\Hacks\CreateHackRequest;
use App\Http\Requests\User\Hacks\UpdateHackRequest;
use App\Models\Hack;
use Illuminate\Http\Request;

class HacksController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        return $user->hacks()->paginate(50);
    }


    public function show(AccessHackRequest $request, Hack $hack)
    {
        return $hack;
    }


    public function store(CreateHackRequest $request)
    {
        $params = $request->validated();
        $user = $request->user();
        
        $hack = $user->hacks()->create($params)->refresh();

        return $hack;
    }


    public function update(UpdateHackRequest $request, Hack $hack)
    {
        $params = $request->validated();
        
        $hack->update($params);

        return $hack;
    }


    public function destroy(AccessHackRequest $request, Hack $hack)
    {
        return $hack->delete();
    }
}
