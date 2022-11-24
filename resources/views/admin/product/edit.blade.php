<x-admin.master>
    <div class="container mt-5">
        <div class="card shadow-sm p-3 mb-5 bg-body rounded">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Products</h1>
                <div class="btn-toolbar mb-2 mb-md-0">

                    <a href="{{ route('product.index') }}">
                        <button type="button" class="btn btn-sm btn-outline-info">
                            <span data-feather="plus"></span>
                            <i class="fa-light fa-list"></i>List</button>
                    </a>
                </div>
            </div>
            <div class="card-body border-cyan-600">
                <h3 class="card-title">Product Add</h3>
                <p class="card-description">
                    product information
                </p>
                <form action="{{ route('product.update', $product->id) }}" method="post" class="forms-sample"
                    enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="row">
                        <div class="col">
                            <div class="form-group ">
                                <input type="text" name="name" placeholder="name" id="name"
                                    class="form-control" value="{{ $product->name }}">
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
                                <input type="text" name="weight" id="weight" class="form-control"
                                    placeholder="weight" value="{{ $product->weight }}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group ">
                                <input type="number" name="price" id="price" class="form-control"
                                    placeholder="price" value="{{ $product->price }}">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">

                                <select name="color_id[]" class="form-control" placeholder="Color" multiple>

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
                                <input type="text" name="info" id="info" class="form-control"
                                    placeholder="info" value="{{ $product->info }}">
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
                                <button type="submit" class="btn btn-block btn-dark form-control">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-admin.master>
