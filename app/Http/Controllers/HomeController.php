<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $quizzes = Quiz::orderBy('id', 'desc')->get();

        return view('pages.home.homepage', ['quizzes' => $quizzes]);
    }

    public function detail($id)
    {
        $quiz = Quiz::find($id);

        return view('pages.home.detail', ['quiz' => $quiz]);
    }

    public function question($quiz_id, $question_id)
    {
        $question = Question::where('quiz_id', $quiz_id)->find($question_id);

        return view('pages.home.pertanyaan', [
            'question' => $question,
            'quiz_id' => $quiz_id
        ]);
    }

    public function question_store(Request $request, $quiz_id, $question_id)
    {
        $question = Question::find($question_id);

        Answer::create([
            'user_id' => Auth::user()->id,
            'question_id' => $question->id,
            'answer' => $request->answer,
            'is_correct' => $question->correct == $request->answer ? 'yes' : 'no'
        ]);

        $next_question = Question::where('quiz_id', $quiz_id)->where('id', '>', $question_id)->orderBy('id', 'asc')->first();

        if ($next_question) {
            return redirect()->route('kuis.pertanyaan', ['quiz_id' => $quiz_id, 'question_id' => $next_question->id]);
        } else {
            return redirect()->route('kuis.berhasil', $quiz_id);
        }
    }

    public function success($id)
    {
        $quiz = Quiz::find($id);
        $user_id = Auth::user()->id;

        $answers = Answer::where('user_id', $user_id)->whereHas('question', function ($query) use ($id) {
            $query->where('quiz_id', $id);
        })->get();

        // hitung skor berdasarkan jawaban yang benar
        $score = $answers->filter(function ($answer) {
            return $answer->is_correct === 'yes';
        })->count();

        return view('pages.home.berhasil', [
            'quiz' => $quiz,
            'score' => $score
        ]);
    }
}
