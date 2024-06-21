<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h1 class="text-2xl font-bold">{{ $posting->title }}</h1>
                    <p class="mt-2">{{ $posting->content }}</p>
                    <div class="text-gray-500 text-sm mt-2">
                        {{ $posting->created_at->format('d M Y') }}
                        <span class="ml-2">Likes: {{ $posting->likes()->count() }}</span>
                        <span class="ml-2">Comments: {{ $posting->comments()->count() }}</span>
                    </div>

                    <h2 class="text-xl font-bold mt-4">Comments</h2>
                    @foreach ($posting->comments as $comment)
                        <div class="border border-gray-200 p-4 rounded mb-4">
                            <p>{{ $comment->message }}</p>
                            <div class="text-gray-500 text-sm mt-2">
                                {{ $comment->created_at->format('d M Y') }}
                                <span class="ml-2">By {{ $comment->user->name }}</span>
                            </div>
                        </div>
                    @endforeach

                    <form action="{{ route('comments.store', $posting->id) }}" method="POST" class="mt-4">
                        @csrf
                        <div class="mb-4">
                            <label for="message" class="block text-sm font-medium text-gray-700">Add Comment</label>
                            <textarea name="message" id="message" rows="3" class="form-textarea mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"></textarea>
                        </div>
                        <div>
                            <button type="submit" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Post Comment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
