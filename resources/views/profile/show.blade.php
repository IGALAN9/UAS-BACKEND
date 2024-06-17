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
                    <h1 class="text-2xl font-bold">Profil Pengguna: {{ $user->username }}</h1>
                    <p class="mt-2">Nama: {{ $user->name }}</p>
                    <!-- Add more user information as needed -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
