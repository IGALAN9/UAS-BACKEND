<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <form action="/posts" class="form-control" method="post">
                        @csrf
                        <textarea class="textarea textarea-bordered mb-2"  cols="30" id="" 
                        name="content" placeholder="Tuliskan Sesuatu..."
                            rows="3"></textarea>
                            <input type="submit" value="Post" class="btn btn-secondary">
                   </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>