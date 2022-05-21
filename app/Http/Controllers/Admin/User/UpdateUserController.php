<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UpdateUserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['required', 'min:3'],
            'username' => ['required', Rule::unique('users', 'username')->ignore($user->id)],
            'email' => ['required', 'unique:users,email,' . $user->id],
        ]);
        $user->update($data);

        return redirect()->route('user.index');
    }
}
