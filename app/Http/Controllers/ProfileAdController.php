<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProfileAdController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ads = Auth::user()->ads()->with('category')->paginate(10);
        return view('profile.ads.index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('profile.ads.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|max:2048',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'location' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:13',
            'condition' => 'nullable|in:new,used',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('ads', 'public');
            $data['image'] = $path;
        }

        $request->user()->ads()->create($data);

        return Redirect::route('profile.ads.index')->with('success', 'Ad created');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ad $ad)
    {
        $this->authorize('update', $ad);

        $categories = Category::all();
        return view('profile.ads.edit', compact('ad', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ad $ad)
    {
        $this->authorize('update', $ad);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'location' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:13',
            'condition' => 'nullable|in:new,used',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('ads', 'public');
            $data['image'] = $path;
        }

        $ad->update($data);

        return Redirect::route('profile.ads.index')->with('success', 'Add succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ad $ad)
    {
        $this->authorize('delete', $ad);

        $ad->delete();

        return Redirect::route('profile.ads.index')->with('success', 'Add succesfully removed.');
    }
}
