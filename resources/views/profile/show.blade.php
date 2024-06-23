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
                    <h1 class="text-2xl font-bold">Profil Pengguna: {{ $user->username }}</h1>
                    <p class="mt-2">Nama: {{ $user->name }}</p>

                </div>

                
            </div>
        </div>
    </div>
</body>
</html>
