<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f8;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #4a5568;
            color: #fff;
            padding: 1rem 2rem;
            text-align: center;
            font-size: 2rem;
            font-weight: bold;
        }

        .py-12 {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }

        .profile-container {
            max-width: 56rem;
            margin: 0 auto;
            padding: 1.5rem;
            gap: 1.5rem;
            display: flex;
            flex-direction: column;
        }

        .profile-section {
            padding: 2rem;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 0.75rem;
            transition: background-color 0.3s, transform 0.3s;
        }

        .profile-section-title {
            font-size: 1.25rem;
            color: #2d3748;
            margin-bottom: 1rem;
            border-bottom: 2px solid #cbd5e0;
            padding-bottom: 0.5rem;
        }

        .max-w-xl {
            max-width: 40rem;
            margin: 0 auto;
        }

        .space-y-6 > * + * {
            margin-top: 1.5rem;
        }

        .nav-link {
            display: flex;
            justify-content: flex-start;
            margin-bottom: 1rem;
        }

        .nav-link button {
            background-color: #4a5568;
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        .nav-link button:hover {
            background-color: #2d3748;
        }

        .follow-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .follow-buttons button {
            background-color: #3182ce;
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        .follow-buttons button:hover {
            background-color: #2b6cb0;
        }

        .follow-list {
            display: none;
            margin-top: 1rem;
            padding: 1rem;
            background-color: #e2e8f0;
            border-radius: 0.375rem;
        }

        .follow-list h2 {
            font-size: 1.25rem;
            color: #2d3748;
            margin-bottom: 0.75rem;
        }

        .follow-list ul {
            list-style: none;
            padding: 0;
        }

        .follow-list ul li {
            margin-bottom: 0.5rem;
        }

        .follow-list ul li a {
            color: #3182ce;
            text-decoration: none;
            transition: color 0.3s;
        }

        .follow-list ul li a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header class="header">
        {{ __('Profile') }}
    </header>

    <div class="py-12">
        <div class="profile-container space-y-6">
            <div class="nav-link hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    <button>{{ __('< Back') }}</button>
                </x-nav-link>
            </div>
            <div class="profile-section">
                <div class="max-w-xl">
                    <h1 class="text-2xl font-bold">{{ $user->username }}</h1>
                    @auth
                    @if (Auth::id() !== $user ->id)
                        @if (Auth::user()->isFollowing($user))
                            <form action="{{ route('users.unfollow', $user ->id) }}" method= "POST">
                                @csrf
                                @method('POST')
                                <button type= "submit" class= "bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Unfollow
                                </button>
                            </form>
                        @else
                            <form action= "{{ route('users.follow', $user->id) }}" method= "POST">
                                @csrf
                                <button  type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Follow
                                </button>
                            </form>
                        @endif
                    @endif
                    @endauth
                    <p class="mt-2">Name: {{ $user->name }}</p>
                    <p class="mt-2">Bio: {{ $user->bio }}</p>
                    
                    <div class="follow-buttons">
                        <x-nav-link :href="route('users.following', $user->id)" :active="request()->routeIs('users.following')">
                            <button id="show-following">Following: {{ $user->following()->count() }}</button>
                        </x-nav-link>

                        <x-nav-link :href="route('users.followers', $user->id)" :active="request()->routeIs('users.followers')">
                            <button id="show-followers">Followers: {{ $user->followers()->count() }}</button>
                        </x-nav-link>
                    </div>

                    <div id="following-list" class="follow-list">
                        <h2>Following</h2>
                        <ul></ul>
                    </div>

                    <div id="followers-list" class="follow-list">
                        <h2>Followers</h2>
                        <ul></ul>
                    </div>

                    <p class="mt-2">Posts: {{ $user->posting()->count() }}</p>
                    @foreach ($user->posting as $post)
                        <div class="border border-gray-200 p-4 rounded mb-4">
                            <p>{{ $post->content }}</p>
                            <div class="text-gray-500 text-sm mt-2">
                                {{ $post->created_at->format('d M Y') }}
                                <a href="{{ route('posting.show', $post->id) }}" class="ml-2 text-blue-500">Comments: {{ $post->comments()->count() }}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
</html>
