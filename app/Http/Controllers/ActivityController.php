<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DailyActivity;

class ActivityController extends Controller
{
    public function addActivity(Request $request)
    {
        
        $data = $request->only(['name', 'hour', 'minute']);

        $request->validate([
            'name' => 'required|min:5|string',
            'hour' => 'required',
            'minute' => 'required',
        ]);

        $activity = DailyActivity::create([
            'name' => $data['name'],
            'hour' => $data['hour'],
            'minute' => $data['minute'],
        ]);
        if($activity){
            return back()->with('success', 'The activity has been added successfully.');
        }else{
            return back()->with('error', 'Something went wrong. Try again.');
        }
    }

    public function getDailyActivities()
    {
        $activities = DailyActivity::all();

        return view('home', ['activities' => $activities]);
    }
}
