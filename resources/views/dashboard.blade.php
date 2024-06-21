<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- @if (session('success'))
                <div> class="alert alert-success mb-2">{{session('success')}}</div>
            @endif

            @if (session('danger'))
                <div> class="alert alert-error mb-2">{{session('danger')}}</div>
            @endif -->

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">
                    <!-- form -->
                   <form action="/posts" class="form-control"
                   method="post">
                        @csrf
                        <textarea
                            class="@error('content')
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
                               <a href="{{route('posts.edit', $posting->id)}}" class="btn btn-warning btn-sm">Edit</a>
                               <form action="{{route('posts.destroy', $posting->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-sm btn-secondary" value="Delete">
                            </form>
                            </div>
                            <div class="card-actions p-2">
                            </div>
                            @auth()
                                
                            
                            @if(Auth::user()->liked($posting))
                                <form action="{{route('posts.unlike', $posting->id)}}" method="POST">
                                    @csrf
                                    <button type="submit" class="fw-light nav-link fs-6"> <span class="btn btn-sm btn-secondary">&#128420
                                        </span> {{$posting->likes()->count()}} </button>
                                    </form>
                            @else
                                <form action="{{route('posts.like', $posting->id)}}" method="POST">
                                    @csrf
                                    <button type="submit" class="fw-light nav-link fs-6"> <span class="btn btn-sm btn-secondary">&#129293
                                        </span> {{$posting->likes()->count()}} </button>
                                    </form>
                            @endif
                            @endauth
                            @guest
                            <a href="{{route('auth.login')}}" class="fw-light nav-link fs-6"> <span class="btn btn-sm btn-secondary">&#129293
                            </span> {{$posting->likes()->count()}} </a>
                            @endguest
                                    <br>

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
