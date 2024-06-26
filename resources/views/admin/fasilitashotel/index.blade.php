@extends('admin.templates.default')
    @section('title', 'Hotel Hebat | Fasilitas Hotel')


@section('content-header')

    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Fasilitas Hotel</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                <li class="breadcrumb-item active">Fasilitas Hotel</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->

@endsection

@section('content')

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
        Tambah Data
    </button>
    <table class="table table-striped ">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Fasilitas</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Image</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fasilitas as $f)

            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $f->nama_fasilitas }}</td>
                <td>{{ $f->deskripsi_fasilitas }}</td>
                <td><img src="/storage/kamar/{{ $f->image }}" width="100px" alt=""></td>
                <td>
                    <a href="/admin/fasilitashotel/{{ $f->id }}/edit" class="btn btn-success">Edit</a>

                    <form action="/fasilitas-hotel/{{ $f->id }}" method="post" class="d-inline">
                    @csrf
                    @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kamar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="/admin/fasilitashotel/create" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="nama_fasilitas" class="form-label">Nama Fasilitas</label>
                        <input type="text" class="form-control @error('nama_fasilitas') is-invalid @enderror" id="nama_fasilitas" name="nama_fasilitas" placeholder="TV" value="{{ old('nama_fasilitas') }}">
                        @error('nama_fasilitas')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control @error('nama_fasilitas') is-invalid @enderror" id="keterangan" name="keterangan" placeholder="Keterangan" value="{{ old('keterangan') }}">
                        @error('keterangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
                        @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
