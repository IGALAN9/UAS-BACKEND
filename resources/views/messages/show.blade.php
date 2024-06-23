<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- search username -->
                    <form action="{{ route ('messages.search') }}" method="GET" class="mb-4">
                        <div class="flex items-center">
                            <input type="text" name="query" class="form-input rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-50 flex-1 block w-full" placeholder="Cari pengguna...">
                            <button type="submit" class="ml-4 btn btn-primary">Cari</button>
                        </div>
                    </form>
                    
                    @if(isset($users))
                        <div class="mb-4">
                            <h2 class="text-lg font-semibold mb-2">Hasil Pencarian</h2>
                            <ul>
                                @foreach ($users as $user)
                                <li>
                                    <a href="{{ route('messages.chat', $user->id) }}" class="text-blue-500 hover:underline">{{ $user->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-4">
                        <h2 class="text-lg font-semibold mb-2">Percakapan Anda</h2>
                        <ul>
                            @forelse ($conversations as $userId => $conversation)
                                @php
                                    $user = $conversation->first()->sender_id == Auth::id() ? $conversation->first()->receiver : $conversation->first()->sender;
                                @endphp
                                <li>
                                    <a href="{{ route('messages.chat', $user->id) }}" class="text-blue-500 hover:underline">{{ $user->name}}</a>
                                </li>
                            @empty
                                <p> Mulai percakapan dengan teman anda sekarang!</p>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
