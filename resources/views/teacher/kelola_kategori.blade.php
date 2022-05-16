@extends('dashboard.app')
@section('title', 'Kelola Kategori')
@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="QA_section mt-3">
                <div class="white_box_tittle list_header">
                    <h4>Data Kategori</h4>
                    <div class="box_right d-flex lms_block">
                        <div class="serach_field_2">
                        </div>
                        <div class="add_button ms-2">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#addcategory" class="btn_1">Add
                                New</a>
                        </div>
                    </div>
                </div>
                <div class="QA_table mb_30">
                    <table class="table lms_table_active2">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Jumlah Buku</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <th scope="row"> <a href="#" class="question_content">
                                            {{ $category->category_name }}</a></th>
                                    <td>10 Buku</td>
                                    <td>
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#editcategory{{ $loop->iteration }}"
                                            class="btn btn-success text-white"><i class="fa fa-pen-alt"></i></a>
                                        <a href="/teacher/delete-category/{{ $category->id }}"
                                            class="btn btn-danger text-white"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Add Category --}}
    <div class="modal fade" id="addcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/teacher/add-category" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Kategori : </label>
                            <input type="text" class="form-control mt-1" name="category_name" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Masukkan Nama Kategori">
                        </div>
                        <div class="form-group mt-2">
                            <label for="exampleInputEmail1">Deskripsi Kategori : </label>
                            <textarea class="form-control mt-1" name="category_description" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Masukkan Deskripsi Kategori" rows="6"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Edit Category --}}
    @foreach ($categories as $category)
        <div class="modal fade" id="editcategory{{ $loop->iteration }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/teacher/edit-category" method="POST">
                            @csrf
                            <input type="hidden" name="category_id" value="{{ $category->id }}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Kategori : </label>
                                <input type="text" class="form-control mt-1" name="category_name" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{ $category->category_name }}"
                                    placeholder="Masukkan Nama Kategori">
                            </div>
                            <div class="form-group mt-2">
                                <label for="exampleInputEmail1">Deskripsi Kategori : </label>
                                <textarea class="form-control mt-1" name="category_description" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    placeholder="Masukkan Deskripsi Kategori"
                                    rows="6">{{ $category->category_description }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
