@extends('main')

@section('container')
    <h1>{{ $title }}</h1>

    <a href="/products" class="btn btn-secondary my-3"><i class="bi bi-caret-left-fill"></i> back</a>

    <form action="/products" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row my-2">
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label for="code">Code</label>
                    <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('code') }}" required>
                    @error('code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="description">Description (product name)</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description') }}" required>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="price">Price (RM)</label>
                    <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="0.00" value="{{ old('price') }}" required>
                    @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label for="barcode">Barcode</label>
                    <input type="text" class="form-control @error('barcode') is-invalid @enderror" id="barcode" name="barcode" value="{{ old('barcode') }}" required>
                    @error('barcode')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select @error('category') is-invalid @enderror" id="category" name="category" required>
                        <option value="" selected disabled>Choose a category</option>
                        <option value="UJIMINDA" {{ (old('category') === 'UJIMINDA') ? 'selected' : '' }}>UJIMINDA</option>
                        <option value="EDUKOMIK" {{ (old('category') === 'EDUKOMIK') ? 'selected' : '' }}>EDUKOMIK</option>
                        <option value="KOMIK ADIK" {{ (old('category') === 'KOMIK ADIK') ? 'selected' : '' }}>KOMIK ADIK</option>
                        <option value="KOMIK GIRL" {{ (old('category') === 'KOMIK GIRL') ? 'selected' : '' }}>KOMIK GIRL</option>
                        <option value="KOMIK BOY" {{ (old('category') === 'KOMIK BOY') ? 'selected' : '' }}>KOMIK BOY</option>
                        <option value="KOMIK FOR ALL" {{ (old('category') === 'KOMIK FOR ALL') ? 'selected' : '' }}>KOMIK FOR ALL</option>
                        <option value="NOVEL" {{ (old('category') === 'NOVEL') ? 'selected' : '' }}>NOVEL</option>
                    </select>
                    @error('category')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="series" class="form-label">Series</label>
                    <input type="text" class="form-control @error('series') is-invalid @enderror" id="series" name="series" value="{{ old('series') }}" required>
                    @error('series')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="image">Product Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image') }}" onchange="previewImage()" required>
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <img src="{{ asset('img/defaultimg.png') }}" alt="" class="img-preview img-fluid my-3  col-sm-5" width="100%">
                </div>
            </div>
        </div>

        <div class="d-flex">
            <button type="submit" class="btn btn-primary my-3 me-2">Submit</button>
            <a href="/products" class="btn btn-secondary my-3">Cancel</a>
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