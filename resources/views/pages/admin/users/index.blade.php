@extends('layouts.admin')

@section('content')
    <h4 class="text-dark mb-5">Pengguna Quizz</h4>

    <div class="card border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Lengkap</th>
                            <th>Alamat Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $item)
                            <tr class="align-middle">
                                <td>{{ ++$key }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <form action="{{ route('pengguna.destroy', $item->id) }}" method="post">
                                            @csrf @method('DELETE')

                                            <button class="btn btn-sm btn-light" type="submit"
                                                onclick="return confirm('Kamu yakin?')">
                                                <i class="bx bx-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
