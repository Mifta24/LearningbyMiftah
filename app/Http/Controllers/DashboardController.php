<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\SubscribeTransaction;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // nyari jumlah student
        $coursesQuery = Course::query();
        if ($user->hasRole('teacher')) {
            $coursesQuery->whereHas('teacher', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            });

            $students = CourseStudent::where('course_id', $coursesQuery->select('id'))
                ->distinct('user_id')  // suapaya kalau ada mahasiswa yang sama join di course lain tetap terhitung satu orang
                ->count('count');
        } else {
            $students = CourseStudent::distinct('user_id')->count('user_id');
        }

        $courses=$coursesQuery->count();
        $categories=Category::count();
        $teachers=Teacher::count();
        $transactions=SubscribeTransaction::count();

        return view('dashboard',compact('students','courses','categories','teachers','transactions'));
    }
}
