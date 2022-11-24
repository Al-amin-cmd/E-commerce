<x-admin.master>

    <x-slot:title>Categories</x-slot:title>

    <x-forms.message />

    <div class="container">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Categories</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="{{ route('categories.pdf') }}">
                        <button type="button" class="btn btn-sm btn-outline-warning"><i class="fa-solid fa-file-pdf"></i>
                            PDF</button>
                    </a>
                    <button type="button" class="btn btn-sm btn-outline-info"><i class="fa-regular fa-file-excel"></i>
                        Excel</button>
                    <a href="{{ route('categories.trash') }}">
                        <button type="button" class="btn btn-sm btn-outline-danger"> <i class="icon-trash"></i>
                            Trash</button>
                    </a>
                </div>
                <a href="{{ route('categories.create') }}">
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
                    <th>Image</th>
                    <th>Details</th>
                    <th>
                        <center>Action</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>

                        <td><img src="{{ asset('storage/categories/' . $category->image) }}" alt="{{ $category->name }}"
                                class="rounded-circle" style="height: 50px" width="70px"></td>
                        <td>{{ $category->details }}</td>
                        <td>
                            <center>
                            <a href="{{ route('categories.show', $category->id) }}" class="btn btn-info text-white"><i
                                    class="icon-eye"></i></a>
                            <a href="{{ route('categories.edit', $category->id) }}"
                                class="btn btn-warning text-white"><i class="fa-solid fa-pen-to-square"></i></a>

                            <form action="{{ route('categories.destory', $category->id) }}" method="post"
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
