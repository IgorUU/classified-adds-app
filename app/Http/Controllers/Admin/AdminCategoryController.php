<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminCategoryController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->paginate(10);
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
    public function store(Request $request)
    {
        // Include parent id
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create($data);

        return Redirect::route('admin.categories.index')->with('success', 'Category created');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $this->authorize('update', $category);

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // Include parent id
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update($data);

        return Redirect::route('admin.categories.index')->with('success', 'Category updated');
    }

    public function destroy(Category $category)
    {
        $this->authorize('delete', $category);

        if ($category->ads()->exists()) {
            return back()->with('error', 'Cannot delete category referenced by ads');
        }

        if ($category->children()->exists()) {
            return back()->with('error', 'Cannot delete category with existing subcategories');
        }

        $category->delete();

        return Redirect::route('admin.categories.index')->with('success', 'Add succesfully removed.');
    }
}
