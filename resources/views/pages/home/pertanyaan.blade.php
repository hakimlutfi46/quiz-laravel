@extends('layouts.home')

@section('content')
    <section class="pt-5 pb-3">
        <h4 class="fw-bold">{{ $question->quiz->quiz_name }}</h4>
        <p class="text-secondary">{{ $question->quiz->description }}</p>
    </section>

    <section>
        <div class="card border-0">
            <div class="card-body">
                <h5 class="text-dark mb-5">{{ $question->question }}</h5>

                <form action="{{ route('kuis.pertanyaan.store', ['quiz_id' => $quiz_id, 'question_id' => $question->id]) }}"
                    method="POST">
                    @csrf

                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input border-secondary" type="radio" name="answer" id="answer_a"
                                value="a">
                            <label class="form-check-label" for="answer_a">
                                {{ $question->answer_a }}
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input border-secondary" type="radio" name="answer" id="answer_b"
                                value="b">
                            <label class="form-check-label" for="answer_b">
                                {{ $question->answer_b }}
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input border-secondary" type="radio" name="answer" id="answer_c"
                                value="c">
                            <label class="form-check-label" for="answer_c">
                                {{ $question->answer_c }}
                            </label>
                        </div>
                    </div>
                    <div class="mb-5">
                        <div class="form-check">
                            <input class="form-check-input border-secondary" type="radio" name="answer" id="answer_d"
                                value="d">
                            <label class="form-check-label" for="answer_d">
                                {{ $question->answer_d }}
                            </label>
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit">
                        Selanjutnya
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection
