<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show() {
        $user = Auth::user();
        return view('pages.profile.edit', compact('user'));
    }

    public function update(Request $request) {
        $user = Auth::user();
        $user->update($request->only(['name', 'email', 'phone', 'address']));
        return redirect()->route('profile.show')->with('success', 'Profile updated successfully');
    }
}
