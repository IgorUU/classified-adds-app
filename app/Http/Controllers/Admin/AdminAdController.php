<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ad;
class AdminAdController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ads = Ad::with(['user', 'category'])->latest()->paginate(15);
        return view('admin.ads.index', compact('ads'));
    }

}
