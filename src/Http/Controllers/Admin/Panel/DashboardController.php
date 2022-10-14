<?php

namespace App\Http\Controllers\Admin\Panel;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.pages.panel.dashboard.index');
    }
}
