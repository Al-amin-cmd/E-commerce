<table>
    <thead>
        <tr>
            <th>SL#</th>
            <th>Name</th>
            {{-- <th>Image</th> --}}
            <th>Details</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $category->name }}</td>

            {{-- <td><img src="{{ asset('storage/categories/' . $category->image) }}" alt="{{ $category->name }}"
            class="rounded-circle" style="height: 60px" width="60px"></td> --}}
            <td>{{ $category->details }}</td>
        </tr>
        @endforeach
    </tbody>
</table>