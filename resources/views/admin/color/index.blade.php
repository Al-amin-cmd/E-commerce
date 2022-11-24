<x-admin.master>

    <x-slot:title>Colors</x-slot:title>

    <x-forms.message />

    <div class="container">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Colors</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="{{ route('colors.trash') }}">
                        <button type="button" class="btn btn-sm btn-outline-danger"><i class="icon-trash"></i>
                            Trash</button>
                    </a>
                </div>
                <a href="{{ route('colors.create') }}">
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
                    <th>Color Code</th>
                    <th>Image</th>
                    <th>
                        <center>Action</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($colors as $color)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $color->name }}</td>
                        <td>{{ $color->code }}</td>
                        <td>
                            <div style="background-color: {{ $color->code }}">{{ $color->code }}</div>
                        </td>

                        <td><a href="{{ route('colors.show', $color->id) }}" class="btn btn-info text-white"><i
                                    class="icon-eye"></i></a>
                            <a href="{{ route('colors.edit', $color->id) }}" class="btn btn-primary text-white"> <i
                                    class="fa-solid fa-pen-to-square"></i> </a>

                            <form action="{{ route('colors.destory', $color->id) }}" method="post"
                                style="display:inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger text-white"
                                    onclick="return confirm('Are you sure want to deleted?')"> <i
                                        class="icon-trash"></i>
                                </button>
                            </form>
                            </center>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin.master>
