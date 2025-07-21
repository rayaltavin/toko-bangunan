<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Master Role</h2>
    </x-slot>

    <div class="py-4 px-6">
        <a href="{{ route('roles.create') }}" class="bg-blue-500 text-black px-4 py-2 rounded">+ Tambah Role</a>

        <table class="mt-4 w-full border">
            <thead>
                <tr>
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Nama Role</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td class="border px-4 py-2">{{ $role->id }}</td>
                        <td class="border px-4 py-2">{{ $role->name }}</td>
                        <td class="border px-4 py-2 flex space-x-2">
                            {{-- Tombol Edit --}}
                            <a href="{{ route('roles.edit', $role->id) }}"
                               class="bg-yellow-400 text-black px-3 py-1 rounded">Edit</a>

                            {{-- Tombol Delete --}}
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus role ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-black px-3 py-1 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
