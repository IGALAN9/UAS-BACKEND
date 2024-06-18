<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">
                    <!-- form -->
                   <form action="/posts" class="form-control" method="post">
                        @csrf
                        <textarea class="@error('content')
                        textarea-error
                        @enderror textarea textarea-bordered mb-2 bg-white"  cols="30" id="" 
                        name="content" placeholder="Tuliskan Sesuatu..."
                            rows="3"></textarea>
                        @error('content')
                            <span class="text-error">{{ $message }}</span>
                        @enderror
                            <input type="submit" value="Post" class="btn btn-secondary">
                   </form>
                    
                   <div class="flex flex-col space-y-4 mt-4">
                    @foreach ($postings as $posting)
                        <div class="card-bordered bg-yellow-100">
                            <div class="card-body">
                                <h2>{{$posting ->user->name}}</h2>
                                <p>{{ $posting ->content}}</p>
                                </div>
                                <div class="card-actions p-2">
                                    <button class="btn btn-sm btn-secondary">Like</button>
                                    <a href="{{ route('postings.show',$posting) }}" class="btn btn-sm btn-secondary">Komentar</a>
                                    <form action="{{ route('bookmarks.store') }}" method="POST" class="inline">
                                        @csrf
                                        <input type="hidden" name="posting_id" value = "{{ $posting->id }}">
                                        <button type="submit" class="btn btn-sm btn secondary">Bookmark</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                 </div>
            </div>
        </div>
    </div>
    <div style="position: fixed; bottom: 70px; right: 20px;">
        <a href="{{ route('messages.show') }}" class="btn btn-primary">Direct Messages</a>
    </div>
    <div style="position: fixed; bottom: 20px; right: 20px;">
        <a href="{{ route('bookmarks.index')}}" class="btn btn-primary">Lihat Bookmark Anda</a>
    </div>
</x-app-layout>