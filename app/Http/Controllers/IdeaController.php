<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function share(){
        $validated = request()->validate([
            'idea'=>'required|min:1|max:250',
        ]);
        $validated['user_id']=auth()->user()->id;
        $ideas = Idea::create([
            'content' => $validated['idea'],
            'user_id' => $validated['user_id']
        ]);

        $ideas->save();

        return redirect()->route('showDashboard')->with('success','Idea Created!');
    }

    public function show(Idea $id){
        return view('idea',['idea'=>$id]);
    }

    public function edit(Idea $id){
        $editing = true;

        return view('idea',[
            'editing' => $editing,
            'idea' => $id
        ]);
    }

    public function update(Idea $id){
        $validated = request()->validate([
            'updated' => 'required|min:1|max:250'
        ]);

        $id->update([
            'content' => $validated['updated']
        ]);

        return redirect()->route('showDashboard')->with('success', 'Idea Updated!');
    }

    public function delete(Idea $id){
        $id->delete();

        return redirect()->route('showDashboard')->with('deleted', 'Idea Deleted!');
    }
}
