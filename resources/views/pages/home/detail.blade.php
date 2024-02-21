@extends('layouts.home')

@section('content')
    <div class="card border-0 mt-5">
        <div class="card-body">
            <span class="success-icon text-success mx-auto border border-success rounded-circle">
                <i class="bx bx-question-mark"></i>
            </span>

            <h3 class="text-center mt-5 mb-3">{{ $quiz->quiz_name }}</h3>
            <h5 class="text-center text-secondary mb-5">{{ $quiz->description }}</h5>

            <a href="{{ route('kuis.pertanyaan', [$quiz->id, $quiz->questions->first()->id]) }}"
                class="btn btn-primary mx-auto" style="width: max-content;">
                Mulai Kuis
            </a>
        </div>
    </div>
@endsection
