<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black-800">Tambah Role</h2>
    </x-slot>

    <div class="py-4 px-6">
        <form method="POST" action="{{ route('roles.store') }}">
            @csrf
            <div>
                <label for="name">Nama Role:</label>
                <input type="text" name="name" id="name" class="border rounded w-full px-3 py-2 mt-1">
                @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>
            <div class="mt-4">
                <button type="submit" class="bg-green-500 text-black px-4 py-2 rounded">Simpan</button>
                <a href="{{ route('roles.index') }}" class="bg-gray-300 text-black px-4 py-2 rounded">Kembali</a>
            </div>
        </form>
    </div>
</x-app-layout>
