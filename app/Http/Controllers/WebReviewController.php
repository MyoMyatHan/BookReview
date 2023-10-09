<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class WebReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        $review = new Review;
        $review->rating = request()->rating;
        $review->content = request()->content;
        $review->book_id = request()->book_id;
        $review->save();

        return back();
    }

    public function delete($id) {
        $review = Review::find($id);

        if($review->user_id == auth()->user()->id ) {
            $review->delete();
            return back();
        } else {
            return back()->with('error', 'Unauthorize');
        }

    }
}
