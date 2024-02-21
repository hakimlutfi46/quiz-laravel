<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $quiz_count = Quiz::count();
        $user_count = User::where('roles', 'pengguna')->count();
        return view('pages.admin.dashboard', [
            'quiz_count' => $quiz_count,
            'user_count' => $user_count
        ]);
    }
}
