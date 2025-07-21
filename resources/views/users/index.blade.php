<x-app-layout>
    <x-slot name="header">Users</x-slot>

    <a href="{{ route('users.create') }}" class="bg-blue-500 text-black px-4 py-2 rounded">Add User</a>

    <div class="overflow-x-auto mt-4">
        <table class="mt-4 w-full border">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-left">Name</th>
                    <th class="px-4 py-2 text-left">Email</th>
                    <th class="px-4 py-2 text-left">Role</th>
                    <th class="px-4 py-2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td class="border px-4 py-2">{{ $user->name }}</td>
                        <td class="border px-4 py-2">{{ $user->email }}</td>
                        <td class="border px-4 py-2">{{ $user->role->name ?? '-' }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="bg-blue-500 text-black px-4 py-2 rounded">Edit</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-black px-4 py-2 rounded" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
