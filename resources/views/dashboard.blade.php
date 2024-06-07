<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if(session('success'))
                <div class="alert alert-success ">{{ session('success')}}</div>
                @endif
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
                    
                   <div class="flex flex-col space-y">
                    @foreach ($postings as $posting)
                        <div class="card-bordered bg-yellow-100">
                            <div class="card-body">
                            <h2>{{$posting ->user->name}}</h2>
                                <p>{{ $posting ->content}}</p>
                            </div>
                        </div>
                    @endforeach
                    </div>
                 </div>
            </div>
        </div>
    </div>
</x-app-layout>