<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use Illuminate\Contracts\View\View;

class AdController extends Controller
{
  /**
   * Show the specified resource.
   */
  public function show(Ad $ad): View
  {
    $ad->load(['category', 'user']);
    return view('ads.show', compact('ad'));
  }
}
