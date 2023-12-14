@extends('main')

@section('container')
    <h1>{{ $title }}</h1>

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex my-3">
        <a href="products/create" class="btn btn-primary me-2">Add new product</a>
        
        <div class="col-auto me-2">
            <form action="/products" method="get">
                @if (request('search'))
                    <input type="hidden" name="search" value="{{ request('search') }}">
                @endif
                <select class="form-select" aria-label="Default select example" name="category" onchange="this.form.submit()">
                    <option value="" {{ ($selectedCategory === '') ? 'selected' : '' }}>All Categories</option>
                    <option value="UJIMINDA" {{ ($selectedCategory === 'UJIMINDA') ? 'selected' : '' }}>UJIMINDA</option>
                    <option value="EDUKOMIK" {{ ($selectedCategory === 'EDUKOMIK') ? 'selected' : '' }}>EDUKOMIK</option>
                    <option value="KOMIK ADIK" {{ ($selectedCategory === 'KOMIK ADIK') ? 'selected' : '' }}>KOMIK ADIK</option>
                    <option value="KOMIK GIRL" {{ ($selectedCategory === 'KOMIK GIRL') ? 'selected' : '' }}>KOMIK GIRL</option>
                    <option value="KOMIK BOY" {{ ($selectedCategory === 'KOMIK BOY') ? 'selected' : '' }}>KOMIK BOY</option>
                    <option value="KOMIK FOR ALL" {{ ($selectedCategory === 'KOMIK FOR ALL') ? 'selected' : '' }}>KOMIK FOR ALL</option>
                    <option value="NOVEL" {{ ($selectedCategory === 'NOVEL') ? 'selected' : '' }}>NOVEL</option>
                </select>
            </form>
        </div>

        <a class="btn btn-secondary me-2" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            <i class="bi bi-search"></i>
        </a>
    </div>

    <div class="collapse {{ request('search') ? 'show' : '' }}" id="collapseExample">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="/products">
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Code / Description / Barcode / Series" name="search" value="{{ request('search') }}">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="table-responsive small col-lg-12">    
        <table class="table table-bordered table-hover table-sm">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Code</th>
                    <th scope="col">Image</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col" style="width: 130px;">Barcode</th>
                    <th scope="col">Series</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                    <th scope="col" style="width: 100px;">Last Update</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product) 
                    <tr>
                        <td>{{ $product->code }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $product->image) }}" alt="" width="50">
                        </td>
                        <td>{{ $product->description }}</td>
                        <td>RM{{ $product->price }}</td>
                        <td>{{ $product->barcode }}</td>
                        <td>{{ $product->series }}</td>
                        <td>{{ $product->category }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="products/{{ $product->id }}" class="btn btn-primary btn-sm mx-1" title="details"><i class="bi bi-eye"></i></a>
                                <a href="" class="btn btn-warning btn-sm mx-1" title="edit"><i class="bi bi-pencil-square"></i></a>
                                <a href="" class="btn btn-danger btn-sm mx-1" title="delete"><i class="bi bi-trash"></i></a>
                            </div>
                        </td>
                        <td>{{ $product->updated_at->diffForHumans() }}</td>                  
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="row justify-content-between my-2">
        <div class="col-auto">
            {{ $products->links() }}
        </div>
        
        <div class="col-auto">
            <span class="pagination-results">
                Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} out of {{ $products->total() }} entries.
            </span>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Check if the search input has a value
            var searchInput = document.querySelector('input[name="search"]');
            var collapseExample = document.getElementById('collapseExample');
    
            if (searchInput && searchInput.value.trim() !== '') {
                // Show the collapse element
                collapseExample.classList.add('show');
            }
        });
    </script>
@endsection