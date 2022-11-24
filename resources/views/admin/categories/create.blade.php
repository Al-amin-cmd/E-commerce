<x-admin.master>
    <x-slot:title>
        Category Create
        </x-slot>



        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Categories</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('categories.index') }}">
                    <button type="button" class="btn btn-sm btn-outline-info">
                        <i class="fa-light fa-list"></i> List
                    </button>
                </a>
            </div>
            @if (session('message'))
                <span class="text-success">{{ session('message') }}</span>
            @endif
        </div>

        {{-- <x-forms.errors /> --}}
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card shadow p-3 mb-5 bg-body rounded">
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('categories.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <x-forms.input type="text" name="name" placeholder="Enter name" label="Name" />
                        </div>
                        <div class="form-group">
                            <x-forms.input type="file" name="image" label='Picture' />
                        </div>
                        <div class="form-group">
                            <x-forms.input type="text" name="details" placeholder="Enter deatils" label="Deatils" />
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        {{-- <div class="container bg-light rounded">
            <form class="forms-sample" action="{{ route('categories.store') }}" method="post"
                enctype="multipart/form-data">

                @csrf

                <x-forms.input type="text" name="name" placeholder="Enter name" label="Name" />
                <x-forms.input type="file" name="image" label='Picture' />
                <x-forms.input type="text" name="details" placeholder="Enter deatils" label="Deatils" /> --}}

        {{-- @php
                $checklist = ['Is Active'];
            @endphp --}}

        {{-- <x-forms.checkbox :checklist="$checklist" /> --}}
        {{-- 
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div> --}}

</x-admin.master>
