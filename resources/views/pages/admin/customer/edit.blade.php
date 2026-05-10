@extends('layouts.backend')
@section('content')

<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Edit Customer</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Customer</h6>
        </div>

        <div class="card-body">
            <form action="{{ route('customer.update', $customer->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label>Nama</label>
                    <input type="text" name="name" value="{{ $customer->name }}" class="form-control">
                </div>


                <div class="form-group mb-3">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ $customer->email }}" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label>Nomor HP</label>
                    <input type="text" name="phone_number" value="{{ $customer->phone_number }}" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label>Alamat</label>
                    <input type="text" name="address" value="{{ $customer->address }}" class="form-control">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('customer.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>

            </form>
        </div>
    </div>

</div>

@endsection