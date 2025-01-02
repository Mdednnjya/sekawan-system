@extends('layouts.main')

@section('content')
    <div class="flex items-center justify-center min-h-[calc(100vh-10rem)]">
        <div class="w-full max-w-md px-6 py-4">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="p-6">
                    @if (session('status'))
                        <div class="mb-4 text-sm font-medium text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-4">
                            <div class="text-sm font-medium text-red-600">
                                Whoops! Something went wrong.
                            </div>

                            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div>
                            <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            />
                        </div>
                        <div class="mt-4">
                            <label for="password" class="block font-medium text-sm text-gray-700">Password</label>
                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('register') }}" class="text-sm text-gray-600 hover:text-gray-900 mr-4">
                                Register new account
                            </a>

                            <button type="submit" class="bg-teal-800 text-white py-2 px-4 rounded-md hover:bg-teal-900 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2">
                                Log in
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
