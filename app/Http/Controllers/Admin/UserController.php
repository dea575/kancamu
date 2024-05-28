<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mood;
use App\Models\Question;
use App\Models\QuestionUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::whereNot('role_id', Auth::user()->role_id)->get();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    public function test(QuestionUser $test)
    {
        return view('admin.user.test', compact('test'));
    }

    public function mood(User $user)
    {
        $moods = Mood::where('user_id', $user->id)->get();
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
                'start' => $mood->date,
                'color' => $color
            ];
        }

        return $events;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
