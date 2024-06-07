<x-app-layout>

    <div class="py-12">
        <div class="mx-auto max-w-7xl  sm:px-6 lg:p-8">
            <div class="card-bordered bg-yellow-100"> 
                <div class="card-body">
                <h2>{{$posting ->user->name}}</h2>
                    <p>{{ $posting ->content}}</p>
                </div>
               
            </div>

            <div class="card ">
                <div class="card-title">Komentar</div>
                <div class="card-body">
                    <form action="{{ route('comments.store', $posting)}}" method="post" class="form-control">
                        @csrf
                        <textarea name="Comment" rows="3" class="textarea textarea-bordered" 
                        placeholder="Tuliskan Komentar"></textarea>
                        <input type="submit" value="Comment" class="btn btn-secondary">
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>