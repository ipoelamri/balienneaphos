<?php

namespace App\Http\Controllers;


class AboutController extends Controller
{
    public function about(){
        
        // Logic to display the about page
        return inertia('About');
    }
}
