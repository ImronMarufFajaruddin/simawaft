<?php

namespace App\Http\Controllers\Landings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return  view('landings-page.index');
    }
}
