<x-app-layout>
    <x-slot name="header">Edit User</x-slot>

    <form method="POST" action="{{ route('users.update', $user->id) }}" class="mt-4">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-4">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-4">
            <label>Role</label>
            <select name="role_id" class="w-full border rounded p-2" required>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" @selected($user->role_id == $role->id)>{{ $role->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded">Update</button>
    </form>
</x-app-layout>
