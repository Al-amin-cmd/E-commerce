<x-admin.master>
    <x-slot:title>
        banner edit
        </x-slot>

        @if (session('message'))
        <span class="text-success">{{ session('message') }}</span>
        @endif

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">banners</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('banners.index') }}">
                    <button type="button" class="btn btn-sm btn-outline-info">
                        <span data-feather="list"></span>
                        List
                    </button>
                </a>
            </div>
        </div>

        <x-forms.errors />

        <div class="container bg-light rounded">
            <form action="{{ route('banners.update', $banner->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <x-forms.input type="text" name="title" value="{{ $banner->title }}" placeholder="Enter Title" label="Title" />
                <x-forms.input type="text" name="sub_title_one" value="{{ $banner->sub_title_one }}" placeholder="Enter Title" label="sub_title_one" />
                <x-forms.input type="text" name="sub_title_two" value="{{ $banner->sub_title_two }}" placeholder="Enter Title" label="sub_title_two" />
                <x-forms.input type="text" name="discretion" value="{{ $banner->discretion }}" placeholder="Enter Deatils" label="discretion" />
                <x-forms.input type="text" name="button" value="{{ $banner->button }}" placeholder="Enter Button" label="Button" />
                <x-forms.input type="file" name="image" label='Picture' />

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>

</x-admin.master>