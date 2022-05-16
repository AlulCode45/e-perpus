@extends('dashboard.app')
@section('title', 'Profile')
@section('content')
    <div class="card shadow shadow-lg">
        <div class="card-body">
            <center>
                <img src="{{ asset('photo_user/' . $teacher->photo_user) }}" class="rounded rounded-circle mb-5"
                    width="270" height="270">
            </center>
            <form action="/teacher/profile" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-2">
                    <label for="photo_user">Upload Foto</label>
                    <input type="file" class="form-control" id="photo_user" name="photo_user">
                </div>
                <div class="form-group mb-2">
                    <label for="">Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ $teacher['name'] }}">
                </div>
                <div class="form-group mb-2">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $teacher['email'] }}">
                </div>
                <div class="form-group mb-2">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="w-100 d-flex mt-4">
                    <div class="row mx-auto">
                        <div class="col-12 col-md-6">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                        <div class="col-12 col-md-6">
                            <a href="/teacher" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
