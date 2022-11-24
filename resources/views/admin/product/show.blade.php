<x-admin.master>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Products</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

            <a href="{{ route('product.index') }}">
                <button type="button" class="btn btn-sm btn-outline-info">
                    <span data-feather="plus"></span>
                    <i class="fa-light fa-list"></i>List</button>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card" style="width: 80%;">
                <img src="{{ asset('product/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Price :&nbsp;<b>{{ $product->price }}</b></li>
                <li class="list-group-item">Category:&nbsp;<b>{{ $product->category->name }}</b></li>
                <li class="list-group-item">Info:&nbsp;<b>{{ $product->info }}</b></li>
                <li class="list-group-item">Weight:&nbsp;<b>{{ $product->weight }}</b></li>
                <li class="list-group-item">Colors:</li>
                @foreach ($product->color as $row)
                    <li class="list-group-item">{{ $row->name }}&nbsp;{{ $row->code }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</x-admin.master>
