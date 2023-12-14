@extends('main')

@section('container')
    <h1>{{ $title }}</h1>

    <div class="d-flex my-3">
        <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle me-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Transfer Stock 
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="#">Semenyih <i class="bi bi-arrow-right"></i> Melawati</a></li>
                <li><a class="dropdown-item" href="#">Melawati <i class="bi bi-arrow-right"></i> Semenyih</a></li>
            </ul>
        </div>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Stock From
            </button>
            <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item active" href="#">View All</a></li>
                <li><a class="dropdown-item" href="#">Semenyih</a></li>
                <li><a class="dropdown-item" href="#">Melawati</a></li>
            </ul>
        </div>
    </div>

    

    <div class="table-responsive small col-lg-12">
        <table class="table table-bordered table-hover table-sm">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Code</th>
                    <th scope="col">Image</th>
                    <th scope="col">Description</th>
                    <th scope="col" style="width: 130px;">Barcode</th>
                    <th scope="col">Status</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($semenyihstock as $semenyih) 
                    <tr>
                        <td>{{ $semenyih->product->code }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $semenyih->product->image) }}" alt="" width="50">
                        </td>
                        <td>{{ $semenyih->product->description }}</td>
                        <td>{{ $semenyih->product->barcode }}</td>
                        <td class="{{ ($semenyih->status === "AVAILABLE") ? 'bg-success' : (($semenyih->status === "LOW STOCK") ? 'bg-warning' : 'bg-danger') }}">{{ $semenyih->status }}</td>
                        <td>{{ $semenyih->quantity }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="" class="btn btn-primary btn-sm mx-1"><i class="bi bi-eye"></i></a>
                                <a href="" class="btn btn-warning btn-sm mx-1"><i class="bi bi-pencil-square"></i></a>
                                <a href="" class="btn btn-danger btn-sm mx-1"><i class="bi bi-trash"></i></a>
                            </div>
                        </td>                    
                    </tr>
                @endforeach
                @foreach ($melawatistock as $melawati) 
                    <tr>
                        <td>{{ $melawati->product->code }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $melawati->product->image) }}" alt="" width="50">
                        </td>
                        <td>{{ $melawati->product->description }}</td>
                        <td>{{ $melawati->product->barcode }}</td>
                        <td class="{{ ($melawati->status === "AVAILABLE") ? 'bg-success' : (($melawati->status === "LOW STOCK") ? 'bg-warning' : 'bg-danger') }}">{{ $melawati->status }}</td>
                        <td>{{ $melawati->quantity }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="" class="btn btn-primary btn-sm mx-1"><i class="bi bi-eye"></i></a>
                                <a href="" class="btn btn-warning btn-sm mx-1"><i class="bi bi-pencil-square"></i></a>
                                <a href="" class="btn btn-danger btn-sm mx-1"><i class="bi bi-trash"></i></a>
                            </div>
                        </td>                    
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection