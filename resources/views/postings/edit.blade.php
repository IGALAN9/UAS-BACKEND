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

        .textarea-error {
            border-color: #e3342f;
        }

        .text-error {
            color: #e3342f;
        }
    </style>
</head>

<body>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:p-8 bg-base-100 profile-container">
            <div class="profile-section">
                <div class="max-w-xl">
                    <h3 class="profile-section-title">{{ __('Edit Post') }}</h3>
                    <form action="{{ route('posts.update', $posting->id) }}" class="form-control" method='post'>
                        @csrf
                        @method('PUT')
                        <div class="mb-3 w-full">
                            <textarea name="content" id="" cols="30" rows="3" class="@error('content') textarea-error @enderror textarea textarea-bordered w-full">{{ $posting->content }}</textarea>
                            @error('content')
                                <span class="text-error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <input type="submit" value="Edit" class="btn btn-secondary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

