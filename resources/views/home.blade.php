@extends('layouts/main')

@section('content')
    <h1>qwe</h1><div class="flex items-center justify-center min-h-[calc(100vh-10rem)]">
        @auth
            <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white rounded-lg shadow-sm p-8">
                    <h1 class="text-2xl font-semibold mb-4">Welcome to Dashboard</h1>
                    <p class="text-gray-600">Welcome back, {{ auth()->user()->name }}!</p>
                </div>
            </div>
        @else
            <div class="w-full max-w-md">
                <div class="bg-white rounded-lg shadow-sm p-8">
                    <h2 class="text-2xl font-semibold text-center mb-8">Login</h2>

                    @if ($errors->any())
                        <div class="mb-4 bg-red-50 text-red-500 p-4 rounded-md">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        <div class="space-y-6">
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" required class="mt-1 block w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-cyan-500 focus:border-cyan-500">
                            </div>

                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                <input type="password" name="password" id="password" required class="mt-1 block w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-cyan-500 focus:border-cyan-500">
                            </div>

                            <button type="submit" class="w-full bg-teal-800 text-white py-2 px-4 rounded-md hover:bg-teal-900 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2">
                                Log in
                            </button>
                        </div>
                    </form>

                    <div class="mt-4 text-center text-sm text-gray-600">
                        Don't have an account?
                        <a href="{{ route('register') }}" class="text-cyan-600 hover:text-cyan-500">Sign up</a>
                    </div>
                </div>
            </div>
        @endauth
    </div>
@endsection
