@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <form action="{{ route('posts') }}" method="post">
                {{-- cross site requet forgery --}}
                @csrf
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
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="10"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror"
                        placeholder="Post Something!"></textarea>
                    @error('body')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Post</button>
                </div>
            </form>
        </div>
    </div>

@endsection
