<x-admin.master>

    <x-slot:title>Color trash</x-slot:title>

    <x-forms.message />

    <div class="container">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Color</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="{{ route('colors.index') }}">
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
                    <th>Color Code</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($colors as $color)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $color->name }}</td>
                        <td>{{ $color->code }}</td>
                        <td><a href="{{ route('colors.show', $color->id) }}" class="btn btn-info text-white"><i
                                    class="icon-eye"></i></a>
                            <a href="{{ route('colors.restore', $color->id) }}"
                                class="btn btn-primary text-white">Restore</a>

                            <form action="{{ route('colors.delete', $color->id) }}" method="post"
                                style="display:inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger text-white"
                                    onclick="return confirm('Are you sure want to delete?')"><i
                                        class="icon-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin.master>
