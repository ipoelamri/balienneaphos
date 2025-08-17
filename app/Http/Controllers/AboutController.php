<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Builder\Function_;

class AboutController extends Controller
{
    public function about(){
        
        // Logic to display the about page
        return inertia('About');
    }
}
