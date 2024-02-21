@extends('layouts.home')

@section('content')
    <section class="py-5">
        <h2 class="text-center fw-bold mb-3">Selamat Datang di Quizz</h2>
        <p class="text-center text-secondary">
            tempat yang sempurna bagi para penikmat tantangan dan pencari pengetahuan.
            <br class="d-none d-md-block"> Dengan berbagai kuis yang menarik dan bervariasi, platform ini
            menyajikan
            <br class="d-none d-md-block"> pengalaman kuis online yang interaktif dan mendidik.
        </p>
    </section>

    <section>
        <h5 class="mb-0 text-dark fw-bold mb-4">List Kuis</h5>

        <div class="row g-3">
            @foreach ($quizzes as $item)
                <div class="col-md-6">
                    <a href="{{ route('kuis.detail', $item->id) }}" class="card">
                        <div class="card-body">
                            <h5 class="text-dark text-center">{{ $item->quiz_name }}</h5>
                            <p class="mb-0 text-secondary text-center fs-7">
                                {{ $item->description }}
                            </p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
@endsection
