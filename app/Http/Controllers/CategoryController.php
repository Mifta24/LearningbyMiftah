<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderByDesc('id')->get();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {


        DB::transaction(function () use ($request) {

            $validated = $request->validated();
            // condition icon
            if ($request->hasFile('icon')) {
                $iconPath = $request->file('icon')->store('icon', 'public');
                $validated['icon'] = $iconPath;
            } else {
                $iconPath = "images/icon-default.png";
                $validated['icon'] = $iconPath;
            }

            $validated['slug'] = Str::slug($validated['name']);
            Category::create($validated);
        });

        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.categories.detail', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {

        DB::transaction(function () use ($request, $category) {
            $validated = $request->validated();

            // condition icon
            if ($request->hasFile('icon')) {
                $iconPath = $request->file('icon')->store('icon', 'public');
                $validated['icon'] = $iconPath;
            }


            $category->update($validated);
        });

        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {

        DB::beginTransaction();
        try {
            $category->delete();
            DB::commit();
            return redirect()->route('admin.categories.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('admin.categories.index')->with('error', 'Terjadi sebuah error');
        }
    }
}
