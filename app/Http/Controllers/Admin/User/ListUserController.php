<?php

namespace App\Http\Controllers\Admin\User;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class ListUserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // User::latest('id')->paginate(5)
        // return User::latest('id')->paginate(5);

        // CARA PERTAMA SEARCH
        // $users = User::query();

        // if ($request->search) {
        //     $users = $users->where('name', 'like', '%' . $request->search . '%');
        // }

        // return Inertia::render('Admin/User/ListUser', [
        //     'users' => $users->latest('id')->paginate(5)
        // ]);

        // CARA KEDUA SEARCH
        // $users = User::when($request->search, function ($query) use ($request) {
        //     $query->where('name', 'like', '%' . $request->search . '%');
        // })->latest('id')->paginate(5);

        // return Inertia::render('Admin/User/ListUser', [
        //     'users' => $users
        // ]);

        //CARA KETIGA SEARCH

        return Inertia::render('Admin/User/ListUser', [
            'users' => User::query()
                ->when($request->search, function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->search . '%');
                })
                ->when($request->role, function ($query) use ($request) {
                    $query->where('role', $request->role);
                })
                ->latest('id')
                ->paginate(5)
                ->withQueryString(),
            'filters' => $request->only('search', 'role')
        ]);
    }
}
