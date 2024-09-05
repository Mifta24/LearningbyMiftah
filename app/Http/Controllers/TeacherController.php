<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreTeacherRequest;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use PhpParser\Node\Stmt\TryCatch;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::orderByDesc('id')->get();
        return view('admin.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherRequest $request)
    {


        $validated = $request->validated();
        $user = User::where('email', $validated['email'])->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'data tidak ditemukan',
            ]);
        }

        // jika user ini sudah jadi guru
        if ($user->hasRole('teacher')) {

            return back()->withErrors([
                'email' => 'Email sudah menjadi guru'
            ]);
        }

        DB::transaction(function () use ($user, $validated) {

            $validated['user_id'] = $user->id;
            $validated['is_active'] = true;
            Teacher::create($validated);

            // hapus role student dari user yang akan jadi teacher
            if ($user->hasRole('student')) {

                $user->removeRole('student');
            }
            $user->assignRole('teacher');
        });

        return redirect()->route('admin.teachers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        return view('admin.teachers.index', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        return view('admin.teachers.index', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {

        try {
            $teacher->delete();
            // mengembalikkan role nya ke student
            $user = User::find($teacher->user_id);
            $user->removeRole('teacher');
            $user->assignRole('student');

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            $error = ValidationException::withMessages([
                'system error' => ['System error' . $e->getMessage()]
            ]);
            throw $error;
        }
    }
}
