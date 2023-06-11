<?php

namespace App\Jobs;

use App\Mail\NewReviewOnBook;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendNewReviewMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $review;
    /**
     * Create a new job instance.
     */
    public function __construct($review)
    {
        $this->review = $review;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Send email to the author of the book
        $this->review->book->authors->each(function ($author) {
            Mail::to($author->email)->send(new NewReviewOnBook($this->review));
        });
    }
}
