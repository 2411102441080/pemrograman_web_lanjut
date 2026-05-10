@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-2">
                <div class="card-header py-3">
                    <h5 class="mb-0">{{ __('Welcome Back!') }}</h5>
                </div>

                <div class="card-body py-4">
                    @if (session('status'))
                        <div class="alert alert-success border-0 shadow-sm mb-4" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="text-center">
                        <div class="mb-3">
                        </div>
                        <h4 class="fw-bold text-dark">Halo, {{ Auth::user()->name }}!</h4>
                        <p class="text-muted">{{ __('Anda berhasil masuk ke dashboard sistem.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection