<x-admin.master>

    <x-slot:title>Role</x-slot:title>

    <x-forms.message />

    <div class="container">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Roles</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="{{ route('role.trash') }}">
                        <button type="button" class="btn btn-sm btn-outline-danger"><i class="icon-trash"></i>
                            Trash</button>
                    </a>
                </div>
                <a href="{{ route('role.create') }}">
                    <button type="button" class="btn btn-sm btn-outline-primary">
                        <span data-feather="plus"></span>
                        <i class="icon-folder"></i> Add New
                    </button>
                </a>
            </div>
        </div>

        <table class="table bg-light rounded">
            <thead class="bg-primary text-white">
                <tr>
                    <th>SL#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>
                        <center>Action</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($role as $role)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->description }}</td>
                        <td>
                            <center>
                            <a href="{{ route('role.edit', $role->id) }}" class="btn btn-primary text-white"><i
                                    class="fa-solid fa-pen-to-square"></i></a>

                            <form action="{{ route('role.destroy', $role->id) }}" method="post" style="display:inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger text-white"
                                    onclick="return confirm('Are you sure want to deleted?')"><i
                                        class="icon-trash"></i></button>
                            </form>
                            </center>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin.master>
