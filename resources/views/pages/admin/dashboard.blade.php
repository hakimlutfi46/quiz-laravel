@extends('layouts.admin')

@section('content')
    <h3 class="text-dark mb-5">Selamat Datang Kembali, Muhammad Hakim</h3>

    <div class="row">
        <div class="col-md-3">
            <a href="admin-list-kuis.html" class="card">
                <div class="card-body">
                    <i class='bx bx-brain fs-1 text-primary'></i>
                    <h5 class="text-dark mt-2">{{ number_format($quiz_count) }} Kuis</h5>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="admin-list-pengguna.html" class="card">
                <div class="card-body">
                    <i class='bx bx-user fs-1 text-primary'></i>
                    <h5 class="text-dark mt-2">{{ number_format($user_count) }} Pengguna</h5>
                </div>
            </a>
        </div>
    </div>
@endsection
