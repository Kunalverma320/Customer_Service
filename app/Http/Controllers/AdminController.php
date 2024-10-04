<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('Admin.pages.home');
    }
    public function role()
    {
        return view('Admin.pages.role');
    }
    public function category()
    {
        return view('Admin.pages.category');
    }
}
