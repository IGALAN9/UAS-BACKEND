<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Timeline') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('post.store') }}" method="post">
                        @csrf
                        {{ __("Selamat datang di medsos kelompok 2 back end ayeea ayyeeaaa") }}
                        <textarea id = "message" class="w-full rounded textarea textarea-bordered" rows="3"
                        placeholder="Post something..."></textarea>
                        <Input type="submit" value="post, ini kayaknya ada yang salah" class="button">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
