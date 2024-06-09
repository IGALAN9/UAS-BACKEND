<x-app-layout>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:p=8 spacey-4">
            @foreach($bookmarks as $bookmark)
            <div class="card-bordered bg-yellow-100 mb-2">
                <div class="card-body">
                    <h2>{{ $bookmark->posting->user->name }}</h2>
                    <p>{{$bookmark->posting->content}}</p>
                    <form action="{{ route('bookmarks.destroy', $bookmark->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-secondary">Hapus Bookmark</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>