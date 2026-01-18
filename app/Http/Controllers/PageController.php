<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Review;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $categories = Category::all();
        $reviews = Review::all();

        return view('welcome', ['categories' => $categories, 'reviews' => $reviews]);
    }

    public function changeLanguage($locale)
    {
        session()->put('locale', $locale);
        return back();
    }
}
