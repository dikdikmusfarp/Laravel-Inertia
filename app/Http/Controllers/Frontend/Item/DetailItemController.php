<?php

namespace App\Http\Controllers\Frontend\Item;

use App\Http\Controllers\Controller;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DetailItemController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Item $item)
    {
        $item->increment('views');
        return ItemResource::make($item->load('user'));
        // return ItemResource::make($item);
        return Inertia::render('Frontend/Item/DetailItem', [
            'item' => ItemResource::make($item->load('user')),
            'similarItems' => Item::with('user')->inRandomOrder()->take(4)->get(),
        ]);
    }
}
