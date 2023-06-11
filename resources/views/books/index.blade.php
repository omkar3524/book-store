@extends('layouts.public')

@section('content')
    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <h1 class="text-gray-100 text-3xl mb-4">Books list</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($books as $book)
                <div class="max-w-sm rounded overflow-hidden shadow-lg text-white border-gray-600 border-2 relative hover:bg-gray-700 ">
                    <div class="p-4"><img class="w-full"
                            src="https://cdn-icons-png.flaticon.com/512/716/716797.png?w=900&t=st=1686412648~exp=1686413248~hmac=38f8fbc3187695be7e2229bad92f10713e31b90dca7ad25b3c553c09896e4d1e"
                            alt="Sunset in the mountains"></div>
                    <div class="px-6 py-4 h-32">
                        <div class="font-bold text-xl mb-2"><a class="underline hover:text-gray-400"
                                href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a></div>
                        <p class="text-gray-100 text-base">
                            {{ str()->of($book->description)->limit(80) }}
                        </p>
                    </div>
                    <div class="px-6 pt-4 pb-2 mb-10">
                        @forelse($book->authors as $key => $author)
                            <span
                                class="inline-block py-1 text-sm font-semibold text-gray-500 mb-1 mr-1">{{ $author->name }} {{ $loop->last ? '': ',' }}
                            </span>
                        @empty
                            <span class="inline-block py-1 text-sm font-semibold text-gray-500 mr-2 mb-1">Unknown
                            </span>
                        @endforelse

                    </div>
                    <div class="px-6 pt-4 pb-2 absolute bottom-0">
                        <span
                            class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $book->category->name }}</span>
                        <span
                            class="inline-block bg-yellow-500 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ '$ ' . $book->price }}</span>
                        </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
