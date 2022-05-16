@extends('dashboard.app')
@section('title', 'Profile')
@section('content')
    <div class="card shadow shadow-lg">
        <div class="card-body">
            <center>
                <img src="{{ asset('photo_user/' . $student->photo_user) }}" class="rounded rounded-circle mb-5"
                    width="270" height="270">
            </center>
            <form action="/student/profile" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-2">
                    <label for="photo_user">Upload Foto</label>
                    <input type="file" class="form-control" id="photo_user" name="photo_user">
                </div>
                <div class="form-group mb-2">
                    <label for="">Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ $student['name'] }}">
                </div>
                <div class="form-group mb-2">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $student['email'] }}">
                </div>
                <div class="form-group mb-2">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group mb-2">
                    <label for="">Absen</label>
                    <input type="text" name="absen" class="form-control" value="{{ $student['absent'] }}">
                </div>
                <div class="form-group mb-2">
                    <label for="">Kelas</label>
                    <input type="text" name="class" class="form-control" value="{{ $student['class'] }}">
                </div>
                <div class="w-100 d-flex mt-4">
                    <div class="row mx-auto">
                        <div class="col-12 col-md-6">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                        <div class="col-12 col-md-6">
                            <a href="/student" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
