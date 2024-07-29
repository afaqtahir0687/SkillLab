@extends('layout.master')
@section('content')

    <div class="content">
        <div class="container-fluid pt-4 px-4 mb-5">
            <div class="border-bottom">
                <h3 class="all-adjustment text-center pb-2 mb-0">All Products</h3>
            </div>

            <div class="card border-0 card-shadow rounded-3 p-2 mt-4">
                <div class="card-header border-0 bg-white">
                    <div class="row my-3">
                        <div class="col-md-3 col-12 mt-2">
                            <div class="input-search position-relative">
                                <input type="text" placeholder="Search Table" class="form-control rounded-3 subheading" />
                                <span class="fa fa-search search-icon text-secondary"></spanclass=>
                            </div>
                        </div>

                        <div class="col-md-9 col-12 text-end">
                            <a href="#" class="btn create-btn rounded-3 mt-2">Filter <i class="bi bi-funnel"></i></a>
                            <a href="#" class="btn rounded-3 mt-2 excel-btn">Excel <i
                                    class="bi bi-file-earmark-text"></i></a>
                            <a href="#" class="btn pdf rounded-3 mt-2">Pdf <i class="bi bi-file-earmark"></i></a>
                            <a href="{{ route('products.create') }}" class="btn create-btn rounded-3 mt-2">Create <i
                                    class="bi bi-plus-lg"></i></a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th class="text-secondary">
                                    <input class="form-check-input fs-5" type="checkbox" />
                                </th>
                                <th class="text-secondary">Image</th>
                                <th class="text-secondary">Date</th>
                                <th class="text-secondary">Product Name</th>
                                <th class="text-secondary">Brand Name</th>
                                <th class="text-secondary">Category Name</th>
                                <th class="text-secondary">Sub Category Name</th>
                                <th class="text-secondary">Description</th>
                                <th class="text-secondary">Currency</th>
                                <th class="text-secondary">Price</th>
                                <th class="text-secondary">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td class="align-middle">
                                    <input class="form-check-input fs-5" type="checkbox" />
                                </td>
                                <td class="align-middle">
                                    @if($product->image && Storage::exists('public/' . $product->image))
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="product Image"
                                        style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;" />
                                    @else
                                    <img src="{{ asset('storage/default-image.jpg') }}" alt="Default Image"
                                        style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;" />
                                    @endif
                                </td>
                                <td class="align-middle">{{ \Carbon\Carbon::parse($product->production_date)->format('d-M-Y') }}</td>
                                <td class="align-middle">{{ $product->name }}</td>
                                <td class="align-middle">{{ $product->brand->name }}</td>
                                <td class="align-middle">{{ $product->category->category }}</td>
                                <td class="align-middle">{{ $product->category->sub_category }}</td>
                                <td class="align-middle">{{ $product->description }}</td>
                                <td class="align-middle">{{ $product->currency }}</td>
                                <td class="align-middle">{{ $product->price }}</td>
                                <td>
                                    <div>
                                        <a class="btn btn-secondary bg-transparent border-0 text-dark" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-v"></i>
                                        </a>
                
                                        <div class="dropdown-menu p-2 ps-0" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="productdetail.html">
                                            <img src="{{ asset('assets/img/menu.svg') }}" class="img-fluid me-1" alt=""/>
                                            Product Detail
                                        </a>
                                        <a class="dropdown-item" href="{{ route('pay', $product->id) }}">
                                            <img src="{{ asset('assets/img/menu.svg') }}" class="img-fluid me-1" alt=""/>
                                            Edit Quotation
                                        </a>
                                        <a class="dropdown-item" href="{{ route('products.create') }}">
                                            <img src="{{ asset('assets/img/menu.svg') }}" class="img-fluid me-1" alt=""/>
                                            Create Product
                                        </a>
                                        <a class="dropdown-item" href="createproduct.html">
                                            <img src="{{ asset('assets/img/menu.svg') }}" class="img-fluid me-1" alt=""/>
                                            Download PDF
                                        </a>
                                        <a class="dropdown-item" href="createproduct.html">
                                            <img src="{{ asset('assets/img/menu.svg') }}" class="img-fluid me-1" alt=""/>
                                            Email Notification
                                        </a>
                                        <a class="dropdown-item" href="createproduct.html">
                                            <img src="{{ asset('assets/img/menu.svg') }}" class="img-fluid me-1" alt=""/>
                                            SMS Notification
                                        </a>
                                        <a class="dropdown-item confirm-text" data-bs-toggle="modal" data-bs-target="#exampleModal-delete" href="#">
                                            <img src="{{ asset('assets/img/menu.svg') }}" class="img-fluid me-1" alt=""/>
                                            Delete Quotation
                                        </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection