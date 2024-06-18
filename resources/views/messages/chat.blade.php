<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-lg font-semibold mb-4">Riwayat Percakapan dengan {{$user->name }}</h2>

                    <div>
                        @foreach ($messages as $message)
                            <div class="mb-4 p-4 bg-gray-100 rounded-lg relative">
                                <div class="flex justify-between items-center">
                                    <strong>
                                        @if ($message->sender_id == Auth::id()):
                                            You
                                        @else
                                            {{ $message->sender->name}}:
                                        @endif
                                    </strong>
                                    @if ($message->sender_id == Auth::id())
                                        <button class="text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700" onclick="toggleDropdown({{ $message->id }})">
                                            &#x2022;&#x2022;&#x2022;
                                        </button>
                                        <div id = "dropdown-{{ $message->id }}" class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded shadow-md">
                                            <form action="{{ route('messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Hapus</button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                                <div>{{ $message->message }}</div>
                                <div class="text-xs text-gray-500 mt-1">{{ $message->created_at->diffForHumans() }}</div>
                            </div>
                        @endforeach

                        @if ($messages->isEmpty())
                        <p>Tidak ada riwayat percakapan dengan pengguna ini</p>
                        @endif
                    </div>

                    <div class="mt-6">
                        <form action="{{ route('messages.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="receiver_id" value="{{ $user->id }}">
                            <textarea name="message" class="form-input rounded-md shadow-sm w-full mb-2" placeholder="Tulis pesan anda..." required></textarea>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleDropdown(messageId) {
            const dropdown = document.getElementById('dropdown-' + messageId);
            dropdown.classList.toggle('hidden');
        }
    </script>

</x-app-layout>