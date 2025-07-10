<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Ad;

class HomeController extends Controller
{
  public function index()
  {
    $ads = Ad::with(['category', 'user'])->latest()->paginate(10);
    return view('home', compact('ads'));
  }
}
