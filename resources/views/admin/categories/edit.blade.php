<x-admin.master>
    <x-slot:title>
        Category edit
        </x-slot>

        @if (session('message'))
            <span class="text-success">{{ session('message') }}</span>
        @endif

        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Categories</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('categories.index') }}">
                    <button type="button" class="btn btn-sm btn-outline-info">
                        <span data-feather="list"></span>
                        List
                    </button>
                </a>
            </div>
        </div>

        <x-forms.errors />

        <div class="container bg-light rounded">
            <form action="{{ route('categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <x-forms.input type="text" name="name" value="{{ $category->name }}" placeholder="Enter name"
                    label="Name" />
                <img src="{{ asset('storage/categories/' . $category->image) }}" alt="{{ $category->name }}"
                    class="rounded-circle" style="height: 60px" width="60px">
                <x-forms.input type="file" name="image" label='Picture' />
                <x-forms.input type="text" name="details" value="{{ $category->details }}"
                    placeholder="Enter deatils" label="Deatils" />

                {{-- @php
                $checklist = ['Is Active'];
            @endphp --}}

                {{-- <x-forms.checkbox :checklist="$checklist" /> --}}

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>

</x-admin.master>
