<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CVController extends Controller
{
    public function index()
    {
        return view("admin.pages.cv.home");
    }
}
