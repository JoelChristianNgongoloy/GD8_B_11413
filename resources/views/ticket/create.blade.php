@extends('dashboard')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Ticket</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="#">Ticket</a>
                    </li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('ticket.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="font-weightbold">Class</label>
                                    <input type="text" class="form-control @error('class') is-invalid @enderror" name="class" value="{{ old('class') }}" placeholder="Masukkan Nama Ticket">
                                    @error('class')
                                    <div class="invalid-feedback">
                                        x Class Tidak Boleh kosong !
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="font-weightbold">Price</label>
                                    <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" placeholder="Masukkan Price">
                                    @error('price')
                                    <div class="invalid-feedback">
                                        Price Tidak Boleh kosong !
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label class="font-weightbold">Movie</label>
                                    <select class="form-select @error('movie_id') is-invalid @enderror" aria-label="Default select example" name="movie_id">
                                        <option selected>Pilih Movie</option>
                                        @foreach ($movies as $movie)    
                                        <option value="{{ $movie->id }}">{{ $movie->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('movie_id')
                                    <div class="invalid-feedback">
                                        x Harus Pilih salah satu Movie !
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-md btn-primary mt-2">SIMPAN</button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

@endsection