@extends('layouts.public')

@section('content')
    <x-alert-success></x-alert-success>
    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        
        <h1 class="text-3xl font-bold mb-8 text-gray-100">
            <x-back-to-home></x-back-to-home>
            Book Details</h1>

        <div class="max-w-2xl bg-white rounded shadow-md p-8">
            <div class="flex justify-between mb-4">
                <h2 class="text-2xl font-bold">{{ $book->title }}</h2>
                <span class="text-gray-600">Price: ${{ $book->price }}</span>
                <span class="text-gray-600">{{ round($book->reviews_avg_rating) }} stars</span>
            </div>
            <p class="text-gray-700 mb-6">{{ $book->description }}</p>

            {{-- Add authors here --}}
            <div class="flex mb-4 border-t">
                <span class="text-gray-600 font-semibold mr-2">Authors:</span><br>
                @foreach ($book->authors as $author)
                    <span class="text-gray-700 mr-2">{{ $author->name }}{{ $loop->last ? '' : ', ' }}</span>
                @endforeach
            </div>

        </div>
        {{-- Add review form here --}}
        <h3 class="text-xl font-bold mb-2 mt-8 text-gray-100">Share your review</h3>
        <form action="{{ route('reviews.store', $book->id) }}" method="post">
            @csrf
            <div>
                <label for="stars" class="text-gray-100">Stars</label> <br>
                <select name="rating" id="rating">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div>
                <label for="stars" class="text-gray-100">Review</label> <br>
                <textarea name="review" id="review" cols="30" rows="10" class="w-full max-w-2xl"></textarea>
            </div>

            <button type="submit" class="text-gray-800 border px-5 py-2 bg-white hover:bg-gray-200">Submit</button>
        </form>

        <h3 class="text-xl font-bold mb-2 mt-8 text-gray-100">All Reviews</h3>
        <div class="max-w-2xl bg-white rounded shadow-md p-8 ">

            <ul>
                <!-- Review Item -->
                @foreach ($book->reviews as $review)
                    <li class="border-b py-2">
                        <div class="flex items-center mb-2">
                            <span class="mr-2 font-bold">{{ $review->user->name }}</span>
                            <span class="text-gray-600">- {{ $review->rating }} stars</span>
                        </div>
                        <p class="text-gray-700">{{ $review->review }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
