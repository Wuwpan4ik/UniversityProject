<?php

namespace App\Http\Controllers;

use App\Models\Work\Work;
use Illuminate\Http\Request;

class MainController extends Controller
{
    protected function index() {
        $works = Work::all();
        return view('main', compact('works'));
    }
}
