<x-mail::message>
# New Review Submitted

A new review has been submitted for the book.

**Book Title:** {{ $review->book->title }}

**Rating:** {{ $review->rating }} stars

**Review Content:**

{{ $review->review }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
