<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Edit Role</h2>
    </x-slot>

    <div class="py-4 px-6">
        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mt-4">
                <label for="name" class="block">Nama Role</label>
                <input type="text" name="name" id="name"
                       value="{{ old('name', $role->name) }}"
                       class="w-full border px-3 py-2 rounded mt-1" required>
            </div>

            <div class="mt-4 flex gap-2">
                <button type="submit" class="bg-green-500 text-black px-4 py-2 rounded">Simpan</button>
                <a href="{{ route('roles.index') }}" class="bg-gray-400 text-black px-4 py-2 rounded">Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
