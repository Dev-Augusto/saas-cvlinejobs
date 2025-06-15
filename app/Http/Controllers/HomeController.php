<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Admin\Company\Company;
use App\Models\Partner;
use App\Models\Slide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $slide = Slide::first();
        $about = About::first();
        $partners = Partner::all();
        $companys = Company::all();
        return view("pages.index", compact("slide","about","partners", 'companys'));
    }
}
