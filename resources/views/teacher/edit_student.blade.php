@extends('dashboard.app')
@section('title', 'Edit Siswa')
@section('content')
    <div class="card rounded shadow shadow-lg">
        <div class="card-body">
            <center>
                <img src="{{ asset('photo_user/' . $student->photo_user) }}" class="rounded rounded-circle mb-4"
                    style="width: 200px; height:200px">
            </center>
            <form action="/teacher/edit-student" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $student->id }}">
                <div class="form-group mb-2">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}">
                </div>
                <div class="form-group mb-2">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $student->email }}">
                </div>
                <div class="form-group mb-2">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group mb-2">
                    <label for="class">Kelas</label>
                    <input type="text" class="form-control" id="class" name="class" value="{{ $student->class }}">
                </div>
                <div class="form-group mb-2">
                    <label for="class">Absen</label>
                    <input type="text" class="form-control" id="absent" name="absent" value="{{ $student->absent }}">
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('teacher.kelola_siswa') }}" class="btn btn-info text-white">Kembali</a>
            </form>

        </div>
    </div>
@endsection
