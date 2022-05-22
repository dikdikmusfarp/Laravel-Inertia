<?php

namespace App\Http\Controllers\Admin\Item;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApproveItemController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Item $item)
    {
        $item->approved_at = now();
        $item->save();

        return back()->with('success', 'Item approved.');
    }
}
