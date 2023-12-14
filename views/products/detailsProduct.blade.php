@extends('main')

@section('container')
    <h1>{{ $title }}</h1>

    <a href="/products" class="btn btn-secondary my-3"><i class="bi bi-caret-left-fill"></i> back</a>

    <form>
        @csrf
        <div class="row my-2">
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label for="code">Code</label>
                    <input type="text" class="form-control" id="code" value="{{ $product->code }}" disabled>
                </div>
                <div class="form-group my-2">
                    <label for="description">Description (product name)</label>
                    <input type="text" class="form-control" id="description" value="{{ $product->description }}" disabled>
                </div>
                <div class="form-group my-2">
                    <label for="price">Price (RM)</label>
                    <input type="text" class="form-control" id="price" value="{{ $product->price }}" disabled>
                </div>
                <div class="form-group my-2">
                    <label for="barcode">Barcode</label>
                    <input type="text" class="form-control" id="barcode" value="{{ $product->barcode }}" disabled>
                </div>
                <div class="form-group">
                    <label for="category" class="form-label">Category</label>
                    <input type="text" class="form-control" id="category" value="{{ $product->category }}" disabled>
                </div>
                <div class="form-group">
                    <label for="series" class="form-label">Series</label>
                    <input type="text" class="form-control" id="series" value="{{ $product->series }}" disabled>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="row">
                        <label for="image">Product Image</label>
                    </div>
                    <div class="row">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="" class="img-preview img-fluid my-3  col-sm-5" width="100%">
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview')
            
            imgPreview.style.display = 'block';
            
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection