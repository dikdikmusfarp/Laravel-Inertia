<?php

namespace App\Http\Controllers\Frontend\Item;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateItemController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Item $item)
    {
        // $this->validate($request, [
        //     'image' => 'image'
        // ]);
        // dd($request->all());
        $this->authorize('update',$item);

        $image = $item->image;

        if ($request->hasFile('image')) {
            if (Storage::exists($item->image)) {
                Storage::delete($item->image);
            }

            $image = $request->file('image')->store('items/images');
        }

        $item->update([
            'name' => $request->name ?? $item->name,
            'description' => $request->description ?? $item->description,
            'price' => $request->price ?? $item->price,
            'image' => $image,
        ]);

        return redirect()->back();
    }
}
