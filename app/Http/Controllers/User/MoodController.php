<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Mood;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MoodController extends Controller
{
    public function index()
    {
        $todayMood = Mood::whereDate('date', now())->first();
        $mood = '';
        if ($todayMood) {
            $mood = $todayMood->mood;
        }
        return view('mood', compact('mood'));
    }

    public function getMood()
    {
        $moods = Mood::where('user_id', Auth::user()->id)->get();
        $events = [];
        foreach ($moods as $key => $mood) {
            $color = '';
            switch ($mood->mood) {
                case 'sad':
                    $color = '#02B4B7';
                    break;
                case 'moved':
                    $color = '#6669B8';
                    break;
                case 'disappointed':
                    $color = '#FF8C03';
                    break;
                case 'angry':
                    $color = '#FF6346';
                    break;
                case 'happy':
                    $color = '#5777E9';
                    break;
                default:
                    $color = '#84D445';
                    break;
            }

            $events[] = [
                'date' => $mood->date,
                'color' => $color
            ];
        }

        return $events;

    }

    public function store(Request $request)
    {
        $input = $request->all();
        $mood = Mood::updateOrCreate([
            'date' => date('Y-m-d'),
            'user_id' => Auth::user()->id
        ], $input);

        session()->flash('true', 1);
        return back();
    }
}
