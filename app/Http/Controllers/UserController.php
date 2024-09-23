<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $id){
        return view('profile',['user'=>$id]);
    }

    public function edit(User $id){
        return view('profile.edit',['user'=>$id]);
    }

    public function update(User $id){
        $validated = request()->validate([
            'name' => 'required|min:3|max:15',
            'image' => 'nullable|image',
            'bio' => 'nullable|min:3|max:250'
        ]);

        $id->update($validated);

        return view('profile',['user'=>$id]);
    }
}
