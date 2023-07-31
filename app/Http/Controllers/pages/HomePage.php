<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class HomePage extends Controller
{
  public function index()
  {

    $videos = Video::all();

    return view('content.pages.pages-home', compact('videos'));
  }
}
