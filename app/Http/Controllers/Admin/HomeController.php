<?php

namespace App\Http\Controllers\Admin;

class HomeController
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
