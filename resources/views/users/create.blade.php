<x-app-layout>
    <x-slot name="header">Create User</x-slot>

    <form method="POST" action="{{ route('users.store') }}">
        @csrf

        <div class="mt-4">
            <label>Name</label>
            <input name="name" type="text" class="block w-full" required>
        </div>

        <div class="mt-4">
            <label>Email</label>
            <input name="email" type="email" class="block w-full" required>
        </div>

        <div class="mt-4">
            <label>Password</label>
            <input name="password" type="password" class="block w-full" required>
        </div>

        <div class="mt-4">
            <label>Confirm Password</label>
            <input name="password_confirmation" type="password" class="block w-full" required>
        </div>

        <div class="mt-4">
            <label>Role</label>
            <select name="role_id" class="block w-full">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mt-4">
            <a href="{{ route('users.index') }}" class="bg-gray-400 text-Black px-4 py-2 rounded">Cancel</a>
            <button type="submit" class="bg-blue-600 text-black px-4 py-2 rounded">Simpan</button>
        </div>
    </form>
</x-app-layout>
