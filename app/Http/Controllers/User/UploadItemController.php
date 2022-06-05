<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadItemController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'description' => ['required', 'min:8'],
            'image' => ['required', 'image'],
            'price' => ['required', 'numeric'],
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('items/images');
        }

        $request->user()->items()->create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $image,

        ]);

        return redirect()->back();
    }
}
