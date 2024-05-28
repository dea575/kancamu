<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\QuestionUser;
use App\Models\QuestionUserAnswer;
use App\Models\Result;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questionDatas = Question::get();
        $num = -1;
        $questions = [];
        foreach ($questionDatas as $key => $data) {
            if ($key % 5 == 0) {
                $num += 1;
            }
            $questions[$num][] = $data;
        }
        return view('test.test', compact('questions', 'num'));
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
        $input = $request->all();
        $data = [];
        $score = 0;
        foreach ($input['question_id'] as $key => $value) {
            $score += $value['score'];
            $data[$key] = [
                'answer' => $value['answer'],
                'score' => $value['score'],
            ];
        }

        $result = Result::where([['max', '>=', $score], ['min', '<=', $score]])->orWhere('min', '>=', $score)->first();
        if (!$result) {
            return back()->with('msg', 'Belum ada hasil yang cocok!');
        }

        $questionUser = QuestionUser::create([
            'user_id' => Auth::user()->id,
            'result_id' => $result->id,
            'score' => $score,
            'status' => 'done'
        ]);

        $questionUser->Question()->sync($data);

        return redirect()->route('test.show', $questionUser->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(QuestionUser $test)
    {
        if ($test->user_id != Auth::user()->id) {
            return redirect()->route('dashboard');
        }

        return view('test.show', compact('test'));
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

    public function print(QuestionUser $test)
    {
        if ($test->user_id != Auth::user()->id) {
            return redirect()->route('dashboard');
        }

        $pdf = Pdf::loadView('test.print', compact('test'));
        return $pdf->stream();
    }
}
