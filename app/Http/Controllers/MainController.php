<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Work\Work;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        $works = Work::withCount(['likes'])->get();
        return view('main', compact('works'));
    }

    public function topAuthor() {
        $works = Work::withCount(['likes'])->get();
        return view('main', compact('works'));
    }

    public function topWorks() {
        $works = Work::withCount(['likes'])->get()->sortBy('likes_count');
        return view('main', compact('works'));
    }
}
