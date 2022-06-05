<?php

namespace App\Http\Controllers\Frontend\Item;

use App\Http\Controllers\Controller;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EditItemController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Item $item)
    {
        /** Mengambil ID USER yang login
         * $request->user()->id
         * Auth::id()
         * auth()->id()
         *
         * */

        if (auth()->id() !== $item->user_id) {
            abort(403);
        }


        // return ItemResource::make($item);
        return Inertia::render('Frontend/Item/EditItem', [
            'item' => ItemResource::make($item),
        ]);
    }
}
