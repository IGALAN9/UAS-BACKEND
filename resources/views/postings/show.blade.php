<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komentar</title>
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

        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }

        .max-w-7xl {
            max-width: 80rem;
        }

        .sm\\:px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        .lg\\:px-8 {
            padding-left: 2rem;
            padding-right: 2rem;
        }

        .space-y-4 > * + * {
            margin-top: 1rem;
        }

        .card {
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 0.75rem;
            transition: background-color 0.3s, transform 0.3s;
        }

        .card-bordered {
            border: 1px solid #cbd5e0;
        }

        .card-body {
            padding: 1.5rem;
        }

        .card-title {
            font-size: 1.5rem;
            color: #2d3748;
            margin-bottom: 1rem;
            border-bottom: 2px solid #cbd5e0;
            padding-bottom: 0.5rem;
        }

        .card-actions {
            display: flex;
            justify-content: flex-end;
            padding: 1rem;
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

        .textarea-bordered {
            border: 1px solid #cbd5e0;
            border-radius: 0.375rem;
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 0.5rem;
            font-size: 1rem;
        }

        .bg-yellow-100 {
            background-color: #4a5568;
        }

        .bg-base-50 {
            background-color: #f7fafc;
        }

        h2, h3 {
            margin: 0;
            font-size: 1.5rem;
            color: #e2e8f0;
        }

        p {
            margin: 0.5rem 0 0;
            color: #e2e8f0;
            line-height: 1.5;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        /**back button */
        .nav-link {
            display: flex;
            justify-content: flex-start;
            margin-bottom: 1rem;
            margin-left: 124px;
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
    <div class="py-12">

        <div class="nav-link hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <button>{{ __('< Back') }}</button>
            </x-nav-link>
        </div>

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 space-y-4">
            <div class="card card-bordered bg-yellow-100 mb-2">
                <div class="card-body">
                    <h2>{{ $posting->user->name }}</h2>
                    <p>{{ $posting->content }}</p>
                </div>
                <div class="card-actions p-2"></div>
            </div>

            <div class="card bg-base-50">
                <div class="card-body">
                    <div class="card-title">Komentar</div>
                    <form action="{{ route('comments.store', $posting) }}" method="post" class="form-control">
                        @csrf
                        <textarea name="message" rows="3" class="textarea textarea-bordered" placeholder="Tinggalkan komentar"></textarea>
                        <div class="card-actions">
                            <input type="submit" value="Komentar" class="btn btn-secondary">
                        </div>
                    </form>
                </div>
            </div>

            @foreach ($posting->comments as $comment)
                <div class="card card-bordered bg-yellow-100 mb-2">
                    <div class="card-body">
                        <h3>{{ $comment->user->name }}</h3>
                        <p>{{ $comment->message }}</p>
                    </div>
                    <div class="card-actions p-2"></div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
