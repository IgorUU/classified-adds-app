<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\Category;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
  /**
   * Shows all ads for a given category.
   */
  public function show(Category $category): View
  {
    $ads = $this->getCategoryAds($category);

    return view('category.show', compact('category', 'ads'));
  }

  /**
   * Retrieves all ads for the given category, including its children.
   */
  protected function getCategoryAds(Category $category): LengthAwarePaginator
  {
    $categoryIds = Category::where('id', $category->id)
      ->orWhere('parent_id', $category->id)
      ->pluck('id');

    return Ad::whereIn('category_id', $categoryIds)->latest()->paginate(10);
  }
}
