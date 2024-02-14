<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\DailyActivity;
use Illuminate\Support\Facades\Auth;

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

        $userId = Auth::id();

        $activity = DailyActivity::create([
            'user_id' => $userId,
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
        $userId = Auth::id();
        $activities = DailyActivity::where('user_id', $userId)->get();

        return $activities;
    }


    public function getZenQuote()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://zenquotes.io/api/random');

        if ($response->getStatusCode() == 200) {
            $data = json_decode($response->getBody(), true);
            return $data[0]['q'] . ' <br> - ' . $data[0]['a'];
        }

        return null;
    }
}
