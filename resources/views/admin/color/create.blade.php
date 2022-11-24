<x-admin.master>
    <x-slot:title>
        Color Create
        </x-slot>


        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Colors</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('categories.index') }}">
                    <button type="button" class="btn btn-sm btn-outline-info">
                        <span data-feather="list"></span>
                        List
                    </button>
                </a>
            </div>

        </div>

        @if (session('message'))
            <span class="text-success">{{ session('message') }}</span>
        @endif
        {{-- <x-forms.errors /> --}}
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card shadow-sm p-3 mb-5 bg-body rounded">
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('colors.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <x-forms.input type="text" name="name" placeholder="Enter name" label="Name" />
                        </div>
                        <div class="form-group">
                            <x-forms.input type="color" name="code" placeholder="Enter color" label="Color" />
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>

</x-admin.master>
