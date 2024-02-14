<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PlansController extends Controller
{
    public function setGoal(Request $request)
    {
        $userId = Auth::id();

        $goal = $request->input('goal');
        
        if ($userId) {
            $user = User::find($userId);

            if ($user) {
                
                $user->goal = $goal;
                $user->save();

                return back();
            } else {
                return back()->with('error', 'Something went wrong. Try again.');
            }
        } else {
            return back()->with('error', 'Something went wrong. Try again.');
        }
    }
}
