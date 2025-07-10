<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
  public function show(Category $category)
  {
    $ads = $category->ads()->with('user')->latest()->paginate(10);
    return view('category.show', compact('ads', 'category'));
  }
}
