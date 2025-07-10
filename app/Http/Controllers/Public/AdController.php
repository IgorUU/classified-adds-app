<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Ad;

class AdController extends Controller
{
  public function show(Ad $ad)
  {
    $ad->load(['category', 'user']);
    return view('ads.show', compact('ad'));
  }
}
