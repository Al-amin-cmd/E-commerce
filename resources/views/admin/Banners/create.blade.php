<x-admin.master>
    <x-slot:title>
        Banner Create
        </x-slot>

        @if (session('message'))
            <span class="text-success">{{ session('message') }}</span>
        @endif

        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Banners</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('banners.index') }}">
                    <button type="button" class="btn btn-sm btn-outline-info">
                        <span data-feather="list"></span>
                        List
                    </button>
                </a>
            </div>
        </div>

        {{-- <x-forms.errors /> --}}

        <div class="col-md-12 grid-margin stretch-card">

            <div class="card shadow-sm p-3 mb-5 bg-body rounded">
                @if (session('message'))
                    <span class="text-success">{{ session('message') }}</span>
                @endif
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('banners.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <x-forms.input type="text" name="title" placeholder="Enter Title" label="Title" />
                        </div>
                        <div class="form-group">
                            <x-forms.input type="text" name="sub_title_one" placeholder="Enter Title"
                                label="Sub_Title_One" />
                        </div>
                        <div class="form-group">
                            <x-forms.input type="text" name="sub_title_two" placeholder="Enter Title"
                                label="Sub_Title_Two" />
                        </div>
                        <div class="form-group">
                            <x-forms.input type="text" name="discretion" placeholder="Enter Deatils"
                                label="Discretion" />
                        </div>
                        <div class="form-group">
                            <x-forms.input type="text" name="button" placeholder="Enter Button" label="Button" />
                        </div>
                        <div class="form-group">
                            <x-forms.input type="file" name="image" label='Picture' />
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>

</x-admin.master>
