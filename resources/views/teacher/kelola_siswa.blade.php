@extends('dashboard.app')
@section('title', 'Kelola Siswa')
@section('content')
    <div class="row row-cols-1 row-cols-md-4">
        @foreach ($students as $student)
            <div class="col mb-4">
                <div class="card">
                    <img src="{{ asset('photo_user/' . $student->photo_user) }}" class="card-img-top photo-siswa">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $student->name }}</h5>
                        <p class="card-text">
                            <b>Kelas : </b> {{ $student->class }}
                            <br>
                            <b>Absen : </b> {{ $student->absent }}
                            <br>
                            <b>Email : </b> {{ $student->email }}
                        </p>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-2 "><a href="/teacher/edit-student/{{ $student->id }}"
                                    class="text-dark"><i class="fa fa-pencil"></i></a></div>
                            <div class="col-2"><a href="/teacher/delete-student/{{ $student->id }}"
                                    class="text-dark"><i class="fa fa-trash"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
