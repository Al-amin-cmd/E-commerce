<x-admin.master>
    <x-slot:title>banner Show</x-slot:title>


    <div class="container-fluid bg-white">
        <div class="container">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Banner</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">

                    </div>
                    <a href="{{ route('banners.index') }}">
                        <button type="button" class="btn btn-sm btn-outline-primary">
                            <span data-feather="plus"></span>
                            List
                        </button>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="banner-image">
                        <h3><strong>Banner Image</strong></h3>
                        <img src="{{ asset('storage/banners/' . $banner->image) }}" alt="{{ $banner->title }}" style="height: 150px" width="300px">
                    </div>
                </div>
                <div class="col-md-5">
                    <h2><strong>Title:</strong> {{ $banner->title }}</h2>
                    <h4><strong>Sub Title One:</strong> {{ $banner->sub_title_one }}</h4>
                    <h4><strong>Sub Title two:</strong> {{ $banner->sub_title_two }}</h4>
                    <h4><strong>Discretion:</strong> {{ $banner->discretion }}</h4>
                    <h4><strong>Button:</strong> {{ $banner->button }}</h4>
                </div>
            </div>
        </div>


    </div>

</x-admin.master>