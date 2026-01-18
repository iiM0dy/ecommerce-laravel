<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create()
    {
        return view('addreview');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'review' => 'required|string',
        ]);
        $newReview = new Review;

        $newReview->name = $request->name;
        $newReview->email = $request->email;
        $newReview->phone = $request->phone;
        $newReview->subject = $request->subject;
        $newReview->review = $request->review;

        $newReview->save();

        return redirect('/')->with('success', 'Review added successfully!');
    }
}
