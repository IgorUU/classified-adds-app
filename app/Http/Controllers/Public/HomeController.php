<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\Category;

class HomeController extends Controller
{
  public function index()
  {
    $ads = Ad::with(['category', 'user'])->latest()->paginate(10);
    $categories = Category::all();

    $minPrice = Ad::min('price');
    $maxPrice = Ad::max('price');

    return view('home', compact('ads', 'categories', 'minPrice', 'maxPrice'));
  }
}
