<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
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

        .message-container {
            margin-bottom: 1.5rem;
        }

        .message {
            margin-bottom: 1rem;
            padding: 1rem;
            background-color: #f7fafc;
            border-radius: 0.375rem;
            position: relative;
        }

        .message-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            right: 0;
            top: 2rem;
            width: 12rem;
            background-color: #fff;
            border: 1px solid #cbd5e0;
            border-radius: 0.375rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .dropdown-menu button {
            display: block;
            width: 100%;
            text-align: left;
            padding: 0.5rem 1rem;
            color: #4a5568;
            border: none;
            background-color: #fff;
            cursor: pointer;
        }

        .dropdown-menu button:hover {
            background-color: #f0f4f8;
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

        .search-form {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .search-form input {
            flex: 1;
            padding: 0.5rem 1rem;
            border: 1px solid #cbd5e0;
            border-radius: 0.375rem;
            font-size: 1rem;
            outline: none;
            transition: border-color 0.3s;
        }

        .search-form input:focus {
            border-color: #4a5568;
        }

        .search-form button {
            background-color: #4a5568;
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            cursor: pointer;
            font-size: 1rem;
            margin-left: 0.5rem;
            transition: background-color 0.3s;
        }

        .search-form button:hover {
            background-color: #2d3748;
        }

        .search-results,
        .conversations {
            margin-bottom: 1.5rem;
        }

        .search-results h2,
        .conversations h2 {
            font-size: 1.25rem;
            color: #2d3748;
            margin-bottom: 0.75rem;
        }

        .search-results ul,
        .conversations ul {
            list-style: none;
            padding: 0;
        }

        .search-results ul li,
        .conversations ul li {
            margin-bottom: 0.5rem;
        }

        .search-results ul li a,
        .conversations ul li a {
            color: #3182ce;
            text-decoration: none;
            transition: color 0.3s;
        }

        .search-results ul li a:hover,
        .conversations ul li a:hover {
            text-decoration: underline;
        }

        /**back button */
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
    </style>
</head>
<body>
    <header class="header">
        Messages
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
                    <form action="{{ route('messages.search') }}" method="GET" class="search-form">
                        <input type="text" name="query" placeholder="Cari pengguna...">
                        <button type="submit">Cari</button>
                    </form>

                    @if(isset($users))
                        <div class="search-results">
                            <h2>Hasil Pencarian</h2>
                            <ul>
                                @foreach ($users as $user)
                                    <li>
                                        <a href="{{ route('messages.chat', $user->id) }}">{{ $user->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="conversations">
                        <h2>Percakapan Anda</h2>
                        <ul>
                            @forelse ($conversations as $userId => $conversation)
                                @php
                                    $user = $conversation->first()->sender_id == Auth::id() ? $conversation->first()->receiver : $conversation->first()->sender;
                                @endphp
                                <li>
                                    <a href="{{ route('messages.chat', $user->id) }}">{{ $user->name }}</a>
                                </li>
                            @empty
                                <p>Mulai percakapan dengan teman anda sekarang!</p>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
