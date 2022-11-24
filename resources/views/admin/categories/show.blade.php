<x-admin.master>
    <x-slot:title>Category Show</x-slot:title>


    <div class="container-fluid bg-white">
        <div class="container">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Categories</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">

                    </div>
                    <a href="{{ route('categories.index') }}">
                        <button type="button" class="btn btn-sm btn-outline-primary">
                            <span data-feather="plus"></span>
                            List
                        </button>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card" style="width: 80%;">
                        <img src="{{ asset('storage/categories/' . $category->image) }}" class="card-img-top" alt="{{ $category->name }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Name:&nbsp;<b> {{ $category->name }}</b></li>
                        <li class="list-group-item">Details:&nbsp;<b>{{ $category->details }}</b></li>
                    </ul>
                </div>
            </div>
        </div>


    </div>

</x-admin.master>