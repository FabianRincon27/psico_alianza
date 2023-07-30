<?php

namespace App\Http\Controllers\PsicoAlianza;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getHome(){
        return view('PsicoAlianza.home.home');
    }
}
