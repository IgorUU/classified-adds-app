<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
  /**
   * Shows all ads for a given category.
   */
  public function show(Category $category): View
  {
    $ads = $category->ads()->with('user')->latest()->paginate(10);
    return view('category.show', compact('category', 'ads'));
  }
}
