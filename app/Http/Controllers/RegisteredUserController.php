<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator; // Import Validator

class RegisteredUserController extends Controller
{
  public function store(Request $request)
  {
    // Validate user data
    $validator = Validator::make($request->all(), [
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|unique:users,email',
      'password' => 'required|string|min:8|confirmed',
    ]);

    if ($validator->fails()) {
      // Handle validation errors (e.g., redirect back with errors)
      return back()->withErrors($validator);
    }

    // Create the user
    $user = User::create($request->all());

    event(new Registered($user));
    Auth::login($user);

    $notification = [
      'message' => 'Registration Successful!',
      'alert-type' => 'success'
    ];

    return redirect()->with($notification);
  }
}
