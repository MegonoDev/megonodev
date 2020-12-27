<?php

namespace App\Http\Controllers\f;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::paginate(9);
        return view('frontend.portfolio', compact('portfolios'));
    }
}
