<x-admin.master>
    <x-slot:title>Color Show</x-slot:title>


    <div class="container-fluid bg-white">
        <div class="container">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Colors</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">

                    </div>
                    <a href="{{ route('colors.index') }}">
                        <button type="button" class="btn btn-sm btn-outline-primary">
                            <span data-feather="plus"></span>
                            List
                        </button>
                    </a>
                </div>
            </div>
            <table class="table bg-light rounded ps-2">
                <thead class="bg-primary">
                    <tr>
                        <th>SL#</th>
                        <th>Name</th>
                        <th>Color Code</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $color->id }}</td>
                        <td>{{ $color->name }}</td>
                        <td>{{ $color->code }}</td>
                    </tr>
                </tbody>
            </table>
        </div>


    </div>

</x-admin.master>
