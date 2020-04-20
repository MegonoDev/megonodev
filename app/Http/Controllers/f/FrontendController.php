<?php

namespace App\Http\Controllers\f;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function team()
    {
        return view('frontend.team');
    }

    public function profile()
    {
        return view('frontend.profile');
    }

    public function portfolio()
    {
        return view('frontend.portfolio');
    }
}
