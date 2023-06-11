<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-800">
    @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                    <div class="flex items-center">

                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" class=""
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </div>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8 text-gray-100">Book Details</h1>
        
        <div class="max-w-2xl bg-white rounded shadow-md p-8">
            <div class="flex justify-between mb-4">
                <h2 class="text-2xl font-bold">{{ $book->title }}</h2>
                <span class="text-gray-600">Price: ${{ $book->price }}</span>
                <span class="text-gray-600">{{ round($book->reviews_avg_rating) }} stars</span>
            </div>
            <p class="text-gray-700 mb-6">{{ $book->description }}</p>
            
            {{-- Add authors here --}}
            <div class="flex mb-4">
                <span class="text-gray-600 font-semibold">Authors:</span><br>
                <ul class="ml-2">
                    @foreach($book->authors as $author)
                    <li class="text-gray-700">{{ $author->name }}</li>
                    @endforeach
                </ul>
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
                @foreach($book->reviews as $review)
                <li class="border-b py-2">
                    <div class="flex items-center mb-2">
                        <span class="mr-2 font-bold">{{ $review->user->name}}</span>
                        <span class="text-gray-600">- {{ $review->rating}} stars</span>
                    </div>
                    <p class="text-gray-700">{{ $review->review}}</p>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>