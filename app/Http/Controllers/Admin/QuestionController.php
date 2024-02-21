<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        Question::create($data);

        return redirect()->back();
    }

    public function destroy(string $id)
    {
        Question::find($id)->delete();
        return redirect()->back();
    }
}
