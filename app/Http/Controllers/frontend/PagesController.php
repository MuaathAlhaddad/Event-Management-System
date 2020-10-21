<?php

namespace App\Http\Controllers\frontend;

use App\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function news() {
        return view('frontend.pages.news');
    }

    public function home() {
        return view('frontend.pages.home.home', ['events' => Event::orderBy('created_at', 'desc')->take(3)->get()]);
    }
}