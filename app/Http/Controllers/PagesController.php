<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function about(){
        $title = "A propos";
        $numbers = [1,2,3,4,5,6,7,8,9];
        return view('pages/about', compact('title', 'numbers'));   // <==>   return view('pages/about', ['title' => $title, 'numbers' => $numbers]);

       // return view('pages/about', ['title' => $title]);
    }
}
