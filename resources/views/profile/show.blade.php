<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h1 class="text-2xl font-bold">{{ $user->username }}</h1>
                        <!-- Tombol Follow atau Unfollow -->
                        @auth
                        @if (Auth::id() !== $user ->id)
                            @if (Auth::user()->isFollowing($user))
                                <!-- Jika sudah follow -->
                                <form action="{{ route('users.unfollow', $user ->id) }}" method= "POST">
                                    @csrf
                                    @method('POST')
                                    <button type= "submit" class= "bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                        Unfollow
                                    </button>
                                </form>
                            @else
                                <!-- Jika belum follow -->
                                <form action= "{{ route('users.follow', $user->id) }}" method= "POST">
                                    @csrf
                                    <button  type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Follow
                                    </button>
                                </form>
                            @endif
                        @endif
                    @endauth
                    <p class="mt-2">Name: {{ $user->name }}</p>
                    <p class = "mt-2">Following: {{$user->following()->count()}}</p>
                    <p class = "mt-2">Followers:  {{$user->followers()->count()}}</p>
                    <p class = "mt-2">Posts: {{$user->posting()->count()}}</p>
                    @foreach ($user-> posting as $post)
                        <div class = "border border-gray-200 p-4 rounded mb-4">
                            <p>{{ $post -> content}}</p>
                            <div class = "text-gray-500 text-sm mt-2">
                                {{$post -> created_at ->format('d M Y')}}
                            </div>
                            </div>
                            @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
