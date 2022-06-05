<?php

namespace App\Http\Controllers;

use App\Http\Resources\ItemResource;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomepageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return Inertia::render('Homepage', [
            'itemCount' => Item::count(),
            'userCount' => User::where('role', 'user')->count(),
            'totalViews' => Item::sum('views'),
            'randomItem' => ItemResource::make(
                Item::with('user')
                    ->active()
                    ->inRandomOrder()
                    ->first()
            ),
            // 'todayItems' => ItemResource::collection(Item::with('user')
            //     // ->pending()
            //     ->active()
            //     ->inRandomOrder()
            //     ->take(4)
            //     ->get()),
            'todayItems' => ItemResource::collection(Item::with('user')->randomItems()),
        ]);
    }
}
