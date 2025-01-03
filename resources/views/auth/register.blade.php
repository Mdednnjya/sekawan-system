@extends('layouts.main')

@section('content')
    <div class="flex items-center justify-center min-h-[calc(100vh-10rem)]">
        <div class="w-full max-w-md">
            <div class="bg-white rounded-lg shadow-sm p-8">
                <h2 class="text-2xl font-semibold text-center mb-8">Sign up</h2>

                @if ($errors->any())
                    <div class="mb-4 bg-red-50 text-red-500 p-4 rounded-md">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    <div class="space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                   class="mt-1 block w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-cyan-500 focus:border-cyan-500">
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                   class="mt-1 block w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-cyan-500 focus:border-cyan-500">
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input type="password" name="password" id="password" required
                                   class="mt-1 block w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-cyan-500 focus:border-cyan-500">
                        </div>

                        <div>
                            <label for="region" class="block text-sm font-medium text-gray-700">Region</label>
                            <select name="region_id" id="region" required
                                    class="mt-1 block w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-cyan-500 focus:border-cyan-500">
                                <option value="">Select region</option>
                                @foreach($regions as $region)
                                    <option value="{{ $region->id }}">{{ $region->region_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Role</label>
                            <div class="space-x-4">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="role" value="admin" class="form-radio text-cyan-600" checked>
                                    <span class="ml-2">Admin</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="role" value="approver" class="form-radio text-cyan-600">
                                    <span class="ml-2">Approver</span>
                                </label>
                            </div>
                        </div>

                        <div id="position-field" class="hidden">
                            <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
                            <input type="text" name="position" id="position" class="mt-1 block w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-cyan-500 focus:border-cyan-500">
                        </div>

                        <button type="submit" class="w-full bg-teal-800 text-white py-2 px-4 rounded-md hover:bg-teal-900 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2">
                            Create account
                        </button>
                    </div>
                </form>

                <div class="mt-4 text-center text-sm text-gray-600">
                    Already have an account?
                    <a href="/" class="text-cyan-600 hover:text-cyan-500">Log in</a>
                </div>
            </div>
        </div>
    </div>
@endsection
