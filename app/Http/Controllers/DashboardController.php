<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show(){
        $ideas = Idea::orderByDesc('created_at');
        return view('dashboard',['ideas'=>$ideas->paginate(5)]);
    }
}
