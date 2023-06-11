<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Requests\ReviewStoreRequest;
use App\Jobs\SendNewReviewMailJob;

class ReviewController extends Controller
{
    public function store(ReviewStoreRequest $request, Book $book)
    {
        $review = $book->reviews()->updateOrCreate([
            'user_id' => auth()->id(),
        ], $request->validated());

        // Dispatch new job
        dispatch( new SendNewReviewMailJob($review))->onQueue('mails');  

        return redirect()->back()->with('success', 'Review added successfully!');
    }
}
