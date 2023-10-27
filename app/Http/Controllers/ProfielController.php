<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\ProfielUpdateRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;


class ProfielController extends Controller
{
    public function show()
    {
        $user = auth()->user(); // Get the currently logged-in user
        return view('profiel.show', compact('user'));
    }

    public function update (ProfielUpdateRequest $request)
    {
        $user = auth()->user(); // Get the currently logged-in user

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,

        ]);
        return redirect()->route('profiel.show')->with('success', 'Profile updated successfully');
    }
}
