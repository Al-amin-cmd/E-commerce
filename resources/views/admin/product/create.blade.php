<x-admin.master>

    @if (session('message'))
    <span class="text-success">{{ session('message') }}</span>
    @endif

    <x-forms.errors></x-forms.errors>
    <div class="container mt-2">
        <div class="card">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
                <h5></h5>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">

                        <a href="{{ route('product.index') }}">
                            <button type="button" class="btn btn-sm btn-outline-info">
                                <span data-feather="plus"></span>
                                <i class="fa-light fa-list"></i>List</button>
                        </a>
                    </div>

                </div>
            </div>
            <div class="card-body border-cyan-600">
                <h3 class="card-title">Product Add</h3>
                <p class="card-description">
                    product information
                </p>
                <form action="{{ route('product.store') }}" method="post" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group ">
                                <input type="text" name="name" placeholder="name" id="name" class="form-control">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <select name="category_id" class="form-control" placeholder="Category">
                                    @foreach ($category as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col">
                            <div class="form-group ">
                                <input type="text" name="weight" id="weight" class="form-control" placeholder="weight">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group ">
                                <input type="number" name="price" id="price" class="form-control" placeholder="price">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <select name="color_id[]" class="form-control" multiple>
                                    @foreach ($color as $color)
                                    <option value="{{ $color->id }}">{{ $color->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group ">
                                <input type="text" name="info" id="info" class="form-control" placeholder="info">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group ">
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col">
                            <div class="form-group mb-2">
                                <button type="submit" class="btn btn-block btn-dark form-control">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-admin.master>