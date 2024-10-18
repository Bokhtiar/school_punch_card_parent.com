<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use App\Models\Punch;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $students = Student::count();
        $punchIn = Punch::whereDate('punch_time', now()->toDateString())->where('punch_type', 'in')->count();
        $punchOut = Punch::whereDate('punch_time', now()->toDateString())->where('punch_type', 'out')->count();
        $activities = Punch::latest()->take(5)->get();
        return view('welcome', compact('students', 'punchIn', 'punchOut', 'activities'));
    }
}
