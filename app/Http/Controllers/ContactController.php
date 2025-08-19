<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        // Logic to display the contact page
        return inertia('Contact');
    }
}
