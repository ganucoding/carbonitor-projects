<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('public.home.index');
    }

    public function about()
    {
        return view('public.home.about');
    }

    public function projectsLearnMore()
    {
        return view('public.home.projects');
    }
}
