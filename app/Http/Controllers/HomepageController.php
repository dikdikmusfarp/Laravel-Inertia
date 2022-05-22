<?php

namespace App\Http\Controllers;

use App\Models\Item;
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
            'randomItem' => Item::with('user')->inRandomOrder()->first(),
            'todayItems' => Item::with('user')->inRandomOrder()->take(4)->get(),
        ]);
    }
}
