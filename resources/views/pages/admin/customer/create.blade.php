@extends('layouts.backend')
@section('content')

<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Tambah Customer</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Customer</h6>
        </div>

        <div class="card-body">
            <form action="{{ route('customer.store') }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" placeholder="Masukkan nama">
                </div>

                <div class="form-group mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Masukkan email">
                </div>
                <div class="form-group mb-3">
                    <label>Nomor HP</label>
                    <input type="text" name="phone_number" class="form-control" placeholder="Masukkan nomor HP">
                </div>
                <div class="form-group mb-3">
                    <label>Alamat</label>
                    <input type="text" name="address" class="form-control" placeholder="Masukkan alamat">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('customer.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </form>
        </div>
    </div>

</div>

@endsection