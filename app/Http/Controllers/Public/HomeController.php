<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index(Request $request)
  {

    $ads = $this->getFilteredAds($request);

    $categories = Category::all();

    $minPrice = Ad::min('price');
    $maxPrice = Ad::max('price');

    return view('home', compact('ads', 'categories', 'minPrice', 'maxPrice'));
  }

  /**
   * Gets ads filtered by request parameters.
   */
  protected function getFilteredAds(Request $request)
  {
    $query = Ad::query()
      ->with(['category', 'user'])
      ->latest();

    if ($request->filled('title_description')) {
      $query->where(function ($q) use ($request) {
        $q->where('title', 'like', '%' . $request->title_description . '%')
          ->orWhere('description', 'like', '%' . $request->title_description . '%');
      });
    }

    if ($request->filled('price_min')) {
      $query->where('price', '>=', $request->price_min);
    }

    if ($request->filled('price_max')) {
      $query->where('price', '<=', $request->price_max);
    }

    if ($request->filled('location')) {
      $query->where('location', 'like', '%' . $request->location . '%');
    }

    if ($request->filled('category')) {
      $query->where('category_id', $request->category);
    }

    return $query->paginate(10);
  }
}
