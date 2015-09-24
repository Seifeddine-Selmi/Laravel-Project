<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Link;
use \Input;

class LinksController extends Controller
{
    public function create(){

        return view('links.create');
    }

    public function store(){
        $url = Input::get('url');
        $link = Link::firstOrCreate(['url' => $url]);

     /*   $link = Link::where('url', $url)->first();
        if(!$link){
            $link = Link::create(['url' =>  $url]);
        }*/
    return view('links.success', compact('link'));

    }

    public function show($id){

        $link = Link::findOrFail($id);
        return redirect($link->url, 301); // ou
        //return new RedirectResponse($link->url);
    }

}
