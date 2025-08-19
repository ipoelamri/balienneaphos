<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        // Logic to display the services page
        return inertia('Services');
    }
}
