<x-admin.master>

    <x-slot:title>Role trash</x-slot:title>

    <x-forms.message />

    <div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Role</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="{{ route('role.index') }}">
                        <button type="button" class="btn btn-sm btn-outline-danger">List</button>
                    </a>
                </div>
            </div>
        </div>

        <table class="table bg-light rounded">
            <thead class="bg-primary">
                <tr>
                    <th>SL#</th>
                    <th>Name</th>
                    <th>description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($role as $role)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->description }}</td>
                    <td>
                        <a href="{{ route('role.restore', $role->id) }}" class="btn btn-primary text-white">Restore</a>

                        <form action="{{ route('role.delete', $role->id) }}" method="post" style="display:inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger text-white">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin.master>