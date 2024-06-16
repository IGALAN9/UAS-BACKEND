<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- form -->
                    <form action="/posts" class="form-control" method="post" enctype="multipart/form-data">
                        @csrf
                        <textarea class="@error('content') textarea-error @enderror textarea textarea-bordered mb-2 bg-white" cols="30" id="" name="content" placeholder="Tuliskan Sesuatu..." rows="3"></textarea>
                        @error('content')
                            <span class="text-error">{{ $message }}</span>
                        @enderror
                        <input type="file" name="photo" class="file-input file-input-bordered file-input-info bg-yellow-100 w-full max-w-xs" />
                        <input type="submit" value="Post" class="btn btn-secondary">
                    </form>

                    <div class="flex flex-col space-y">
                        @foreach ($postings as $posting)
                        <figure class="px-10 pt-10">
                            @if ($posting->photo)
                                <img src="{{ asset('storage/' . $posting->photo) }}" height="100px" alt="Photo" class="rounded-xl w-1/2" />
                            @else
                                <span>No photo</span>
                            @endif
                        </figure>
                        <div class="card-bordered bg-yellow-100">
                            <div class="card-body">
                                <h2>{{ $posting->user->name }}</h2>
                                <p>{{ $posting->content }}</p>
                            </div>
                            <div class="card-actions p-2">
                                <button class="btn btn-sm btn-secondary">Like</button>
                                <a href="{{ route('postings.show', $posting) }}" class="btn btn-sm btn-secondary">Komentar</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


