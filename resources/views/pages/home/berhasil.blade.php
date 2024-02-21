@extends('layouts.home')

@section('content')
    <div class="card border-0">
        <div class="card-body">
            <span class="success-icon text-success mx-auto border border-success rounded-circle">
                <i class="bx bx-check"></i>
            </span>

            <h3 class="text-center mt-5 mb-3">Kuis berhasil diselesaikan</h3>
            <h5 class="text-secondary text-center mb-5">
                {{ $score }} / {{ $quiz->questions->count() }}
            </h5>

            <a href="{{ route('home') }}" class="btn btn-primary mx-auto" style="width: max-content;">Kembali ke Halaman
                Utama</a>
        </div>
    </div>
@endsection
