<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversation History</title>
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
    </style>
</head>
<body>
    <header class="header">
        Riwayat Percakapan dengan {{ $user->name }}
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
                    <div class="profile-section-title">{{ __('Messages') }}</div>
                    <div class="message-container">
                        @foreach ($messages as $message)
                            <div class="message">
                                <div class="message-header">
                                    <strong>
                                        @if ($message->sender_id == Auth::id())
                                            You
                                        @else
                                            {{ $message->sender->name }}:
                                        @endif
                                    </strong>
                                    @if ($message->sender_id == Auth::id())
                                        <button onclick="toggleDropdown({{ $message->id }})">
                                            &#x2022;&#x2022;&#x2022;
                                        </button>
                                        <div id="dropdown-{{ $message->id }}" class="dropdown-menu">
                                            <form action="{{ route('messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">Hapus</button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                                <div>{{ $message->message }}</div>
                                <div class="text-xs text-gray-500 mt-1">{{ $message->created_at->diffForHumans() }}</div>
                            </div>
                        @endforeach

                        @if ($messages->isEmpty())
                            <p>Tidak ada riwayat percakapan dengan pengguna ini</p>
                        @endif
                    </div>

                    <div class="mt-6">
                        <form action="{{ route('messages.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="receiver_id" value="{{ $user->id }}">
                            <textarea name="message" class="form-input rounded-md shadow-sm w-full mb-2" placeholder="Tulis pesan anda..." required></textarea>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleDropdown(messageId) {
            const dropdown = document.getElementById('dropdown-' + messageId);
            dropdown.classList.toggle('hidden');
        }
    </script>
</body>
</html>
