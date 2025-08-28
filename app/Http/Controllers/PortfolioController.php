<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Experience;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->take(6)->get();
        $experiences = Experience::orderBy('start_date', 'desc')->get();
        
        return view('portfolio.index', compact('projects', 'experiences'));
    }
}
