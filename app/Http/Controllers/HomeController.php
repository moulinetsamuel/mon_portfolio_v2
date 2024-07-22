<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::with('images', 'stacks')->get();
        return view('home', compact('projects'));
    }
}
