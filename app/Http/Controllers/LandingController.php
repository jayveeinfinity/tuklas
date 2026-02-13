<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class LandingController extends Controller
{
    public function __construct()
    {
        Inertia::setRootView('layouts/landing');
    }

    public function index()
    {
        return Inertia::render('Landing/Index');
    }
}
