<?php

namespace App\Http\Controllers\Admin\Item;

use App\Http\Controllers\Controller;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ListItemController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return Inertia::render('Admin/Item/ListItem', [
            'items' => ItemResource::collection(Item::with('user')
                ->when($request->status, function ($query) use ($request) {
                    if ($request->status == 'active') {
                        return $query->active();
                    }
                    return $query->pending();
                })
                ->when($request->user_id, function ($query) use ($request) {
                    $query->where('user_id', $request->user_id);
                })
                ->latest('id')
                ->paginate(5)
                ->withQueryString()),
            'users' => User::orderBy('name')->get(),
            'filters' => $request->only(['status', 'user_id'])
        ]);
    }
}
