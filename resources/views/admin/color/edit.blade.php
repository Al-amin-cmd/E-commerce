<x-admin.master>
    <x-slot:title>
        Color edit
        </x-slot>
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Colors</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('colors.index') }}">
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
        <x-forms.errors />
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card shadow-sm p-3 mb-5 bg-body rounded">
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('colors.update', $color->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <x-forms.input type="text" name="name" value="{{ $color->name }}"
                                placeholder="Enter name" label="Name" />
                        </div>
                        <div class="form-group">
                            <x-forms.input type="color" name="code" class="form-control-color"
                                value="{{ $color->code }}" placeholder="Enter color code" label="Code" />
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
</x-admin.master>
