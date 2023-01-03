

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADMIN Panel | Add New Product</title>
    <!-- trix editor -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous"></script>
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @include('admin.layouts.parts.link-header')

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        @include('admin.layouts.parts.navbar')
        <!-- endnavbar -->

        <!-- sidebar -->
        @include('admin.layouts.parts.sidebar')
        <!-- endsidebar -->
        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Product</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Edit Product</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Product</h3>
                                </div>
                                <div class="card-body">
                                    <form class="row needs-validation" novalidate method="post" action="/admin/product/{{ $product->id }}" enctype="multipart/form-data">
                                        @method('put')
                                        @csrf
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="name" id="name" placeholder="Product Name" required
                                                    value="{{ old('name', $product->name) }}">
                                                    <div class="invalid-feedback">
                                                        Please provide a valid Product Name.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Category</label>

                                                <select class="form-control select2 select2-info" data-dropdown-css-class="select2-info" style="width: 100%;" name="category_id" required
                                                value="{{ old('category_id', $product->category_id) }}">
                                                    <option disabled value="">Open list Product Category</option>
                                                    @foreach ($categories as $category)
                                                        @if (old('category_id', $product->category_id) == $category->id)
                                                            <option value="{{ $category['id'] }}" selected >{{ $category['name'] }}</option>

                                                        @else
                                                            <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                                        @endif
                                                    @endforeach
                                                    
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please provide a valid Product Category.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label>Brand</label>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select text-uppercase" name="brand_id" required value={{ old('brand_id', $product->brand_id) }}">
                                                    <option disabled value="">Open list Product Brand</option>
                                                    @foreach ($brands as $brand)
                                                        @if(old('category_id', $product->brand_id) == $brand->id)
                                                            <option value="{{ $brand['id'] }}" selected>{{ $brand['name'] }}</option>
                                                        @else
                                                            <option value="{{ $brand['id'] }}">{{ $brand['name'] }}</option>
                                                        @endif
                                                    @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid Product Brand.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Capacity</label>
                                                <select class="form-control select2 select2-info" data-dropdown-css-class="select2-info" style="width: 100%;" name="capacity" required
                                                value="{{ old('capacity', $product->capacity) }}">
                                                    <option disabled>Open list Product Capacity</option>
                                                    <option {{ ($product->capacity == '120') ? "selected" : "" }} value="120">120 GB</option>
                                                    <option {{ ($product->capacity == '128') ? "selected" : "" }} value="128">128 GB</option>
                                                    <option {{ ($product->capacity == '240') ? "selected" : "" }} value="240">240 GB</option>
                                                    <option {{ ($product->capacity == '256') ? "selected" : "" }} value="256">256 GB</option>
                                                    <option {{ ($product->capacity == '480') ? "selected" : "" }} value="480">480 GB</option>
                                                    <option {{ ($product->capacity == '512') ? "selected" : "" }} value="512">512 GB</option>
                                                    <option {{ ($product->capacity == '1') ? "selected" : "" }} value="1">1 TB</option>
                                                    <option {{ ($product->capacity == '2') ? "selected" : "" }} value="2">2 TB</option>
                                                </select>

                                                <div class="invalid-feedback">
                                                    Please provide a valid Product Capacity.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Stock</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" name="stok" id="stok" placeholder="Product Stock" required onkeypress="return onlyNumber(event)" minlength="2" maxlength="2" required
                                                            value="{{ old('stok', $product->stok) }}">
                                                            <div class="invalid-feedback">
                                                                Minimum Product Stock of 10 pcs and a maximum of 99 pcs
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="form-btn-group">
                                                            <label>Price</label>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Rp.</span>
                                                                </div>
                                                                <input type="text" class="form-control" name="price" id="price" placeholder="Product Price" required onkeypress="return onlyNumber(event)" minlength="5" maxlength="8"required
                                                                value="{{ old('price', $product->price) }}">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">.00</span>
                                                                </div>
                                                                <div class="invalid-feedback">
                                                                    Minimum Product Price of Rp. 10,000 and a maximum of Rp. 99,999,999
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Weight</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" name="weight" id="weight" placeholder="Product Weight" required onkeypress="return onlyNumber(event)" minlength="3" maxlength="4" required
                                                            value="{{ old('weight', $product->weight) }}">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">gr</span>
                                                            </div>
                                                            <div class="invalid-feedback">
                                                                Minimum Product Weight of 100gr and a maximum of 9.999gr
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <input id="description" type="hidden" name="description" required
                                                value="{{ old('description', $product->description) }}">
                                                <trix-editor input="description"></trix-editor>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Image</label>
                                                <div class="custom-file mb-2">
                                                    <input type="file" class="custom-file-input form-control" name="img" id="img" onchange="showImage(this);" >
                                                    <input type="hidden" name="oldImg" value="{{ $product->img }}">
                                                    <label class="custom-file-label" for="img">Choose an image</label>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid Product Image.
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-3 mx-auto d-block">
                                                        <p class="text-center">New Image</p>
                                                        <img class="rounded" src="#" alt="" id="show-image" style="width: 100%;">
                                                    </div>
                                                    <div class="col-md-3 mx-auto d-block">
                                                        <p class="text-center">Old Image</p>
                                                        <img class="rounded" src="{{ asset('storage/img/product/'.$product['img']) }}" alt="" style="width: 100%;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <button type="submit" class="btn btn-primary  start" name="tambah">
                                                    <i class="fas fa-upload"></i>
                                                    <span> Add New Product</span>
                                                </button>
                                                <a href="{{ url('admin/product/') }}" class="btn btn-warning  cancel">
                                                    <i class="fas fa-times-circle"></i>
                                                    <span> Cancel</span>
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- end main content -->


        <!-- footer -->
        @include('admin.layouts.parts.footer')
        <!-- endfooter -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

    </div>

    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="{{ asset('theme/backend/js/input-form/bs-custom-file-input.min.js') }}"></script>

    @include('admin.layouts.parts.script-body')



   
</body>

</html>