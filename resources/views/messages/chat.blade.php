<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-lg font-semibold mb-4">Riwayat Percakapan dengan {{$user->name }}</h2>

                    <div>
                        @foreach ($messages as $message)
                            <div class="mb-4">
                                <div>
                                    <strong>
                                        @if ($message->sender_id == Auth::id()):
                                            You
                                        @else
                                            {{ $message->sender->name}};
                                        @endif
                                    </strong>
                                </div>
                                <div>{{ $message->message }}</div>
                                <div class="text-xs text-gray-500">{{ $message->created_at->diffForHumans() }}</div>
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
</x-app-layout>