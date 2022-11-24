<x-admin.master>

    <x-slot:title>Products</x-slot:title>

    <x-forms.message />

    <div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Products</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="#">
                        <button type="button" class="btn btn-sm btn-outline-warning"><i class="fa-solid fa-file-pdf"></i>
                            PDF</button>
                    </a>
                    <button type="button" class="btn btn-sm btn-outline-info"><i class="fa-regular fa-file-excel"></i>
                        Excel</button>
                    <a href="{{ route('product.trash') }}">
                        <button type="button" class="btn btn-sm btn-outline-danger"><i class="icon-trash"></i>
                            Trash</button>
                    </a>
                </div>
                <a href="{{ route('product.create') }}">
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
                    <th>info</th>
                    <th>Category</th>
                    <th>weight</th>
                    <th>price</th>
                    <th>
                        <center>
                            Action
                        </center>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->name }}</td>

                    <td><img src="{{ asset('product/' . $product->image) }}" alt="{{ $product->name }}" class="rounded-circle" style="height: 50px" width="70px"></td>
                    <td>{{ $product->info }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->weight }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <center>
                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-info text-white"><i class="icon-eye"></i></a>
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary text-white"><i class="fa-solid fa-pen-to-square"></i></a>

                            <form action="{{ route('product.destroy', $product->id) }}" method="post" style="display:inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger text-white" onclick="return confirm('Are you sure want to deleted?')"><i class="icon-trash"></i></button>
                            </form>
                        </center>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</x-admin.master>