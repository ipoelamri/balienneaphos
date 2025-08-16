<?php

namespace App\Http\Controllers;

use App\Models\portofolio;
use Illuminate\Http\Request;

class portofolioController extends Controller
{
    //
    public function index()
    {
     $portofolios = portofolio::all();

     return inertia('portofolios/index', [
         'portofolios' => $portofolios,
     ]);
        // Logic to display the portfolio items
    }   
}
