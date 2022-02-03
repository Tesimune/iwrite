@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            <form action="{{ route('register') }}" method="post">
                {{-- cross site request forgery (csrf) --}}
                @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" name="name" id="name" placeholder="Your Name"
                        class="bg-gray-100 border-full w-full p-4 rounded-lg @error('name') border-red-500 @enderror"
                        value="{{ old('name') }}">
                    @error('name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="name" class="sr-only">UserName</label>
                    <input type="text" name="username" id="username" placeholder="Your UserName"
                        class="bg-gray-100 border-full w-full p-4 rounded-lg @error('username') border-red-500 @enderror"
                        value="{{ old('username') }}">
                    @error('username')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="sr-only">Emal</label>
                    <input type="email" name="email" id="email" placeholder="Your Email"
                        class="bg-gray-100 border-full w-full p-4 rounded-lg @error('email') border-red-500 @enderror"
                        value="{{ old('email') }}">
                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Your Password"
                        class="bg-gray-100 border-full w-full p-4 rounded-lg @error('password') border-red-500 @enderror">
                    @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="sr-only">Password again</label>
                    <input type="password" name="password_confirmation" id="password_confirmationd"
                        placeholder="Repeat Your Password"
                        class="bg-gray-100 border-full w-full p-4 rounded-lg @error('password_confirmation') border-red-500 @enderror">
                    @error('password_confirmation')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
