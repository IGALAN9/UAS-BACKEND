<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Following</title>
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

        /* Custom styles for following list */
        .following-container {
            margin-top: 2rem;
        }

        .following-list {
            list-style: none;
            padding: 0;
        }

        .following-list li {
            margin-bottom: 1rem;
        }

        .following-list li a {
            color: #3182ce;
            text-decoration: none;
            font-size: 1.2rem;
            transition: color 0.3s;
        }

        .following-list li a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header class="header">
        {{ __('Following') }}
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
                    <h3 class="profile-section-title">{{ __('Following List') }}</h3>
                    <div class="following-container">
                        <ul class="following-list">
                            @foreach($following as $user)
                                <li><a href="{{ route('profile.show', $user->username) }}">{{ $user->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
