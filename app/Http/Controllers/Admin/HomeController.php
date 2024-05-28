<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mood;
use App\Models\QuestionUser;
use App\Models\Result;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $resultDatas = Result::get();
        $results = [];
        $no = -1;
        foreach ($resultDatas as $key => $value) {
            if ($key % 2 == 0) {
                $no+= 1;
            }
            $results[$no][] = $value;
        }

        return view('admin.dashboard', compact('results', 'resultDatas'));
    }

    public function getResult(Request $request)
    {
        $month = explode('-', $request->month);
        $results = Result::get();
        $questionUser = QuestionUser::where(function ($q) use($month, $request){
            if ($request->month) {
                $q->whereMonth('created_at', $month[1])->whereYear('created_at', $month[0]);
            }

            if ($request->gender) {
                $q->whereHas('User', function ($q) use($request){
                    $q->where('gender', $request->gender);
                });
            }
        })->get();
        
        $labels = [];
        $series = [];
        foreach ($results as $key => $result) {
            $test = $questionUser->where('result_id', $result->id);
            
            $count = $test->isNotEmpty() ? round(($test->count() / $questionUser->count()) * 100) : 0;
            $labels[] = ($count != 0 ? $count . '%' : '') ;
            $series[] = $count;
        }

        $response = [
            'labels' => $labels,
            'series' => $series
        ];
        return $response;
    }

    public function getMood(Request $request)
    {
        $month = explode('-', $request->month);
        $moods = ['sad', 'moved', 'disappointed', 'angry', 'happy', 'normal'];

        $userMood = Mood::where(function ($q) use($month, $request){
            if ($request->month) {
                $q->whereMonth('created_at', $month[1])->whereYear('created_at', $month[0]);
            }

            if ($request->gender) {
                $q->whereHas('User', function ($q) use($request){
                    $q->where('gender', $request->gender);
                });
            }
        })->get();

        $labels = [];
        $series = [];
        foreach ($moods as $key => $mood) {
            $data = $userMood->where('mood', $mood);
            
            $count = $data->isNotEmpty() ? round(($data->count() / $userMood->count()) * 100) : 0;
            $labels[] = ($count != 0 ? $count . '%' : '') ;
            $series[] = [
                'value' => $count,
                'className' => 'chartpie-mood-' . $key,
            ];
        }

        $response = [
            'labels' => $labels,
            'series' => $series
        ];

        return $response;
    }
}
