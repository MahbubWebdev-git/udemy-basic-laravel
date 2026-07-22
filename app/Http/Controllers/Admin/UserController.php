<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
 
    public function pendingUsers()
    {

        $users = User::where('is_approved', 0)->orderBy('created_at', 'desc')->get();
        return view('admin.users.pending', compact('users'));
    }


    public function approveUser($id)
    {
        $user = User::findOrFail($id);
        $user->is_approved = 1; 
        $user->save();


        return redirect()->back()->with('success', 'User account approved successfully!');
    }
}
