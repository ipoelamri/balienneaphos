<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
  public function index()
  {
     return inertia('home', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'), // Opsi: tambahkan juga canRegister
        ]);
  }  
}
