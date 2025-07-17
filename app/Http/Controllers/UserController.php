<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        if(request()->has('image')){
            $imagePath = request()->file('image')->store('profile', 'public');
            $validated['image'] = $imagePath;
            Storage::disk('public')->delete($id->image ?? '');
        }

        $id->update($validated);

        return view('profile',['user'=>$id]);
    }

    public function follow(User $id){
        $follower = auth()->user();

        $follower->followings()->attach($id);

        return redirect()->back()->with('success', "User followed successfully");
    }
    public function unfollow(User $id){
        $follower = auth()->user();

        $follower->followings()->detach($id);

        return redirect()->back()->with('success', "User unfollowed successfully");
    }
}
