<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookmarks</title>
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

        .container {
            max-width: 56rem;
            margin: 0 auto;
            padding: 1.5rem;
            gap: 1.5rem;
            display: flex;
            flex-direction: column;
        }

        .card {
            padding: 2rem;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 0.75rem;
            transition: background-color 0.3s, transform 0.3s;
            margin-bottom: 1.5rem;
        }

        .card h2 {
            font-size: 1.25rem;
            color: #2d3748;
            margin-bottom: 1rem;
            border-bottom: 2px solid #cbd5e0;
            padding-bottom: 0.5rem;
        }

        .btn-secondary {
            background-color: #4a5568;
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        .btn-secondary:hover {
            background-color: #2d3748;
        }

        .card-actions {
            margin-top: 1rem;
        }

        .inline {
            display: inline-block;
        }

        .card img {
            max-height: 100px;
            border-radius: 0.75rem;
        }

        .card figure {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            padding: 1rem 0;
        }

        .card span {
            font-size: 0.875rem;
            color: #718096;
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
    <div class="header">
        Bookmarks
    </div>
    <div class="py-12">
        <div class="container">
            <div class="nav-link hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    <button>{{ __('< Back') }}</button>
                </x-nav-link>
            </div>

            @foreach($bookmarks as $bookmark)
            <div class="card">
                <figure class="px-10 pt-10">
                    @if ($bookmark->posting->photo)
                        <img src="{{ asset('storage/' . $bookmark->posting->photo) }}" height="100px" alt="Photo" class="rounded-xl w-1/2" />
                    @elseif ($bookmark->posting->video)
                    <video controls height="200">
                        <source src="{{ asset('storage/' . $bookmark->posting->video) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    @else
                        <span>No photo or video</span>
                    @endif
                </figure>
                <div class="card-body">
                    <h2>{{ $bookmark->posting->user->name }}</h2>
                    <p>{{$bookmark->posting->content}}</p>
                    <form action="{{ route('bookmarks.destroy', $bookmark->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-secondary">Hapus Bookmark</button>
                    </form>
                </div>
    
                <div class="card-actions">
                    <a href="{{ route('postings.show', $bookmark->posting) }}" class="btn btn-secondary">Komentar</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
