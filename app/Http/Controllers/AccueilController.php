<?php

namespace App\Http\Controllers;

use App\Models\Actualite;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function index()
    {
        return view('index',[
        "actualites" => Actualite::all(),

    ]); 



    
}}
