@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="bg-white dark:bg-slate-700 p-4 rounded-lg  w-11/12">
            <form action="{{ route('posts') }}" method="post" class="mb-4">
                {{-- cross site requet forgery --}}
                @csrf

                <div class="flex justify-between mb-3">
                    <button type="submit" class="flex bg-blue-300 text-gray-600 px-4 py-2 rounded shadow-2xl font-medium">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </span>
                        <span class="hidden md:block">Gramma</span>
                    </button>
                    <button type="submit" class="flex bg-blue-300 text-gray-600 px-4 py-2 rounded shadow-2xl font-medium">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                            </svg>
                        </span>
                        <span class="hidden md:block">Plagairism</span>
                    </button>
                    <button type="submit" class="flex bg-blue-300 text-gray-600 px-4 py-2 rounded shadow-2xl font-medium">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                            </svg>
                        </span>
                        <span class="hidden md:block">Calibrate Plagairism</span>
                    </button>
                    <button type="submit" class="flex bg-blue-300 text-gray-600 px-4 py-2 rounded shadow-2xl font-medium">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                            </svg>
                        </span>
                        <span class="hidden md:block">Save</span>
                    </button>
                    <button type="submit" class="flex bg-blue-300 text-gray-600 px-4 py-2 rounded shadow-2xl font-medium">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                            </svg>
                        </span>
                        <span class="hidden md:block">Publish</span>
                    </button>

                </div>
                <div class="mb-4">
                    <label for="title" class="sr-only">Title</label>
                    <input type="text" name="title" id="title"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg mb-3 @error('body') border-red-500 @enderror"
                        placeholder="Post Something!" value="{{ old('title') }}">
                    @error('title')
                        <div class="text-red-500 mt-1 mb-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                    <label for="body" class="sr-only shadow-inner-lg">Body</label>
                    <textarea name="body" id="body" cols="30" rows="10"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror"
                        placeholder="Post Something!"></textarea>
                    @error('body')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            </form>
            @if ($Posts->count())

                @foreach ($Posts as $post)
                    <div class="bg-gray-300 dark:bg-slate-500 p-2 m-2 rounded shadow-lg">
                        <div class="mb-4">
                            <a href="" class="font-bold dark:text-gray-100">{{ $post->user->name }}</a>
                            <span
                                class="text-gray-600 dark:text-gray-400 text-small ml-1">{{ $post->updated_at->diffForHumans() }}</span>
                            <p class="mb-2 font-bold dark:text-white">{{ $post->title }}</p>
                            <p class="mb-2 dark:text-white">{{ $post->body }}</p>
                        </div>
                        <div class="flex items-center">
                            @if (!$post->likedBy(auth()->user()))
                                <form action="{{ route('posts.likes', $post->id) }}" method="post" class="mr-1">
                                    @csrf
                                    <button type="submit" class="text-blue-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                        </svg>
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('posts.likes', $post->id) }}" method="post" class="mr-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-blue-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                        </svg>
                                    </button>
                                </form>
                            @endif
                            <span class="text-gray-800 uppercase font-bold">{{ $post->likes->count() }}
                                {{ Str::plural('Like', $post->likes->count()) }}</span>
                        </div>
                    </div>
                @endforeach
                {{ $Posts->links() }}
            @else
                <p>There are no posts</p>
            @endif
        </div>
    </div>

@endsection
