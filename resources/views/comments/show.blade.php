@extends('layouts.app')

@section('content')
@if(session('status'))
    <div class="bg-green-300 text-green-800 rounded-lg shadow-md p-4 mb-4">
        {{ session('status') }}
    </div>
@endif

<div class="flex items-center justify-center h-screen">
    <div class="container mx-auto">
        <div class="bg-white rounded-lg shadow-md p-4 mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $aquarium->name }}</h1>
            <p class="text-gray-600">{{ $aquarium->description }}</p>
        </div>

        <h2 class="text-xl font-semibold mb-2">Comments</h2>
        <ul class="comment-list space-y-4">
            @if($comments)
                @foreach ($comments as $comment)
                    <li class="comment-item border rounded-lg p-4 shadow-md">
                        <p class="text-blue-500 font-semibold">Comment by: {{ $comment->user->name }}</p>
                        <p class="text-gray-800">{{ $comment->content }}</p>
                    </li>
                @endforeach
            @else
                <li class="text-gray-500 mt-4">No comments available</li>
            @endif
        </ul>

        <h2 class="text-xl font-semibold mt-8">Add a Comment</h2>
        <form action="{{ route('comments.store', ['aquarium' => $aquarium->id]) }}" method="post" class="mt-4">
            @csrf
            <textarea name="content" rows="4" class="w-full p-2 border rounded-lg" required placeholder="Your comment"></textarea>
            <button type="submit" class="mt-4 p-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Submit Comment</button>
        </form>
    </div>
</div>
@endsection
