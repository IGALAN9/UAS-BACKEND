<x-app-layout>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:p=8 spacey-4">
            <div class="card-bordered bg-yellow-100 mb-2">
                <div class="card-body">
                <h2>{{$posting ->user->name}}</h2>
                    <p>{{ $posting ->content}}</p>
                </div>
                <div class="card-actions p-2">
            </div>

            <div class="card bg-base-50 ">
                <div class="card-body">
                    <div class="card-title">Komentar</div>
                    <form action="{{ route('comments.store',$posting) }}" method="post" class="form-control">
                        @csrf
                        <textarea name="message" rows="3" 
                        class="textarea textarea-bordered" placeholder="tinggalkan komentar" ></textarea>
                        <div class="card-actions"><input type="submit" value="Komentar" class="btn btn-secondary"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @foreach ($posting->comments as $comment)
        <div class="mx-auto max-w-7xl sm:px-6 lg:p=8 spacey-4">
            <div class="card-bordered bg-yellow-100 mb-2">
                <div class="card-body">
                <h3>{{$comment ->user->name}}</h3>
                    <p>{{ $comment ->message}}</p>
                </div>
                <div class="card-actions p-2">
            </div>
        @endforeach

</x-app-layout>