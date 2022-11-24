<x-admin.master>

    <x-slot:title>Banners</x-slot:title>

    <x-forms.message />

    <div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Banners</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="#">
                        <button type="button" class="btn btn-sm btn-outline-info"><i class="fa-solid fa-file-pdf"></i>
                            PDF</button>
                    </a>
                    <a href="#">
                        <button type="button" class="btn btn-sm btn-outline-danger"><i class="icon-trash"></i>Trash</button>
                    </a>
                </div>
                <a href="{{ route('banners.create') }}">
                    <button type="button" class="btn btn-sm btn-outline-info">
                        <span data-feather="plus"></span><i class="icon-folder"></i>
                        Add New
                    </button>
                </a>
            </div>
        </div>

        <table class="table bg-light rounded">
            <thead class="bg-primary text-white">
                <tr>
                    <th>SL#</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Subtitle One</th>
                    <th>Subtitle Two</th>
                    <th>Details</th>
                    <th>Button</th>
                    <th>
                        <center>Action</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($banners as $banner)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><img src="{{ asset('storage/banners/' . $banner->image) }}" alt="{{ $banner->name }}" class="rounded-circle" style="height: 50px" width="70px"></td>
                    <td>{{ $banner->title }}</td>
                    <td>{{ $banner->sub_title_one }}</td>
                    <td>{{ $banner->sub_title_two }}</td>
                    <td>{{ $banner->discretion }}</td>
                    <td>{{ $banner->button }}</td>
                    <td>
                        <center>
                            <a href="{{ route('banners.show', $banner->id) }}" class="btn btn-info text-white"><i class="icon-eye"></i></a>
                            <a href="{{ route('banners.edit', $banner->id) }}" class="btn btn-primary text-white"><i class="fa-solid fa-pen-to-square"></i></a>

                            <form action="{{ route('banners.destroy', $banner->id) }}" method="post" style="display:inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger text-white" onclick="return confirm('Are you sure want to delete')"><i class="icon-trash"></i></button>
                            </form>
                        </center>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</x-admin.master>