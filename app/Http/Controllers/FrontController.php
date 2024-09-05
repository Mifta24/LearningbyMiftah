<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Category;
use App\Models\CourseVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SubscribeTransaction;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreSubscribeTransactionRequest;


class FrontController extends Controller
{
    public function index()
    {

        $categories = Category::orderByDesc('id')->get();
        $courses = Course::with(['teacher.user', 'students'])->orderByDesc('id')->get();
        return view('front.index', compact('courses', 'categories'));
    }

    public function detail(Course $course)
    {
        $course->load(['teacher.user', 'category', 'course_videos', 'course_keypoints']);

        return view('front.detail', compact('course'));
    }
    public function pricing()
    {
        $user = Auth::user();

        if ($user) {

            if ($user->hasActiveSubscription()) {
                return
                    redirect()->route('front.index');
            }
        }

        return view('front.pricing');
    }

    public function category(Category $category)
    {
        // Mengambil semua courses yang terkait dengan kategori dan melakukan eager loading
        $courses = $category->courses()->with(['teacher.user', 'students'])->get();

        return view('front.category', compact('category', 'courses'));
    }

    public function learning(Course $course, $courseVideoId)
    {
        $course->load(['teacher', 'category', 'course_videos']);
        $user = Auth::user();


        $video = $course->course_videos->where('id', $courseVideoId)->first();
        if ($user->hasRole('student')) {
            if (!$user->hasActiveSubscription()) {
                return
                    redirect()->route('front.pricing');
            }

            // menambahkan data murid ke kelas tersebut sekali nonton video tercatat
            $user->courses()->syncWithoutDetaching($course->id);
        }

        return view('front.learning', compact('course', 'video'));
    }

    public function checkout()
    {
        $user = Auth::user();

        if ($user->hasActiveSubscription()) {
            return
                redirect()->route('front.index');
        }

        return view('front.checkout');
    }
    public function checkout_store(StoreSubscribeTransactionRequest $request)
    {

        $user = User::where('id', Auth::user()->id)->first();

        if ($user->hasActiveSubscription()) {
            redirect()->route('front.dashboard')->withErrors('Student has been active');
        }

        DB::transaction(function () use ($request, $user) {
            $validated = $request->validated();

            if ($request->hasFile('proof')) {

                $proofPath = $request->file('proof')->store('proofs', 'public');
                $validated['proof'] = $proofPath;
            } else {
                redirect()->route('front.checkout')->withErrors('Proof required');
            }
            $validated['user_id'] = $user->id;
            $validated['total_amount'] = 429000;
            $validated['is_paid'] = false;

            SubscribeTransaction::create($validated);
        });

        return redirect()->route('dashboard');
    }
}
