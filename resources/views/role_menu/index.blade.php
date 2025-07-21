<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Role Menu Management</h2>
    </x-slot>

    <div class="py-4 px-6">
        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form method="GET" action="{{ route('role-menu.index') }}" class="mb-6">
            <label for="role_id" class="block text-sm font-medium text-gray-700 mb-1">Pilih Role:</label>
            <select name="role_id" id="role_id" onchange="this.form.submit()" class="border rounded p-2 w-full max-w-xs">
                <option value="">-- Pilih Role --</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}" {{ $role->id == $role_id ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </form>

        @if ($role_id)
            <form method="POST" action="{{ route('role-menu.store') }}">
                @csrf
                <input type="hidden" name="role_id" value="{{ $role_id }}">

                <h3 class="text-lg font-semibold mb-2">Daftar Menu:</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    @foreach ($menus as $menu)
                        <label class="flex items-center space-x-2 bg-white shadow px-3 py-2 rounded border">
                            <input
                                type="checkbox"
                                name="menu_id[]"
                                value="{{ $menu->id }}"
                                {{ in_array($menu->id, $aksesMenu) ? 'checked' : '' }}
                                class="form-checkbox h-5 w-5 text-blue-600"
                            >
                            <span>{{ $menu->name }}</span>
                        </label>
                    @endforeach
                </div>

                <div class="mt-6">
                    <button type="submit" class="bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700">Simpan Akses</button>
                    <a href="{{ route('role-menu.index') }}" class="ml-2 bg-gray-300 text-black px-4 py-2 rounded hover:bg-gray-400">Cancel</a>
                </div>
            </form>
        @endif
    </div>
</x-app-layout>
