<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:p-8 bg-base-100">
            <form action="{{route('posts.update', $posting->id)}}" class="form-control" method='post'>
                @csrf
                @method('PUT')
                <div class ="mb-3 w-full">
                    <textarea     
                        name="content" id="" cols ="30" rows="3" 
                        class=" @error('content') textarea-error @enderror textarea textarea-bordered w-full">{{$posting->content}}</textarea>
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

</x-app-layout>