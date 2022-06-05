<?php

namespace App\Http\Controllers\User;

use App\Models\Item;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ItemResource;

class ProfileController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // return ItemResource::collection($request->user()->items->load('user'));
        return Inertia::render('Frontend/User/Profile', [
            // 'myItems' => $request->user()->items->load('user'),
            'myItems' => ItemResource::collection($request->user()->items->load('user')),
        ]);
    }
}
