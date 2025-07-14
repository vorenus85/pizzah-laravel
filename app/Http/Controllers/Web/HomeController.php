<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;

class HomeController extends Controller
{
    public function index() {

        $categories = Category::all();

        return view('web.home.index', compact('categories'));
    }
}
