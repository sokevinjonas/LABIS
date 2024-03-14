<?php

namespace App\Http\Controllers\Infos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index(){
        return view('users.home_infos');
    }
}