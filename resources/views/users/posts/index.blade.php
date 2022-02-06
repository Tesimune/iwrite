@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 ">
            <div class="dark:text-white p-6">
                <h1 class="text-2xl font-medium mb-1">{{ $user->name }}</h1>
                <p>Posted {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }} and total of
                    {{ $user->recievedLikes->count() }} likes</p>
            </div>
            <div class="bg-white p-6 rounded-lg">
                @if ($posts->count())

                    @foreach ($posts as $post)
                        <x-post :post="$post" />
                        <a href="{{ route('posts.show', $post) }}"
                            class="flex justify-end font-bold p-1 mx-3 mb-6 bg-slate-500 dark:text-white rounded">Read
                            More</a>
                    @endforeach
                    {{ $posts->links() }}
                @else
                    <p>{{ $user->name }}Does Not Have Any Post</p>
                @endif
            </div>
        </div>
    </div>

@endsection
