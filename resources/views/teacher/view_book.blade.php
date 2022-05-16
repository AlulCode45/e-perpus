@extends('dashboard.app')
@section('title', 'Lihat Buku ' . $book->title)
@section('content')
    <div class="QA_section mt-3">
        <div class="white_box_tittle list_header">
            <h4>{{ $book->title }}</h4>
            <div class="box_right d-flex lms_block">
                <div class="serach_field_2">
                </div>
            </div>
        </div>
    </div>
    {{-- <object data="{{ asset('book/naruto.pdf') }}" type="application/pdf" width="100%" height="600px">
        <p>Alternative text - include a link <a href="myfile.pdf">to the PDF!</a></p>
    </object> --}}
    <div class="card rounded shadow shadow-lg ">
        <div class="card-body">
            <div class="row">
                <div class="col-md-5 col-12 mt-3">
                    <img src="{{ asset('book/cover/' . $book->cover) }}" class="w-100" style="height: 400px;">
                </div>
                <div class="col-md-7 col-12 my-auto mt-3">
                    <div class="">
                        <strong>Judul : </strong>{{ $book->title }} <br>
                        <strong>Penulis : </strong>{{ $book->author }} <br>
                        <strong>Penerbit : </strong>{{ $book->publisher }} <br>
                        <strong>Tahun Terbit : </strong>{{ $book->published_date }} <br>
                        <strong>Kategori : </strong>{{ $categoryModel::find($book->id_category)->category_name }} <br>
                        <strong>Deskripsi : </strong>{{ $book->description }} <br>

                        <div class="mt-5">
                            <a href="/book/view-book/{{ $book->title }}" class="btn btn-primary"><i
                                    class="fa fa-eye"></i></a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#editBook"
                                class="btn btn-success text-white"><i class="fa fa-pen-alt"></i></a>
                            <a href="/teacher/delete-book/{{ $book->id }}" class="btn btn-danger text-white"><i
                                    class="fa fa-trash"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- //modal edit book --}}

    <div class="modal fade" id="editBook" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <form action="/teacher/edit-book" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $book->id }}">
                        <div class="form-group mb-2">
                            <label for="title">Judul</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}"
                                required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="author">Penulis</label>
                            <input type="text" class="form-control" id="author" name="author"
                                value="{{ $book->author }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="publisher">Penerbit</label>
                            <input type="text" class="form-control" id="publisher" name="publisher"
                                value="{{ $book->publisher }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="published_date">Tahun Terbit</label>
                            <input type="text" class="form-control" id="published_date" name="published_date"
                                value="{{ $book->published_date }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="id_category">Kategori</label>
                            <select class="form-control" id="id_category" name="id_category" required>
                                @foreach ($categoryModel::all() as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $book->id_category ? 'selected' : '' }}>
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label for="description">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description" rows="4">{{ $book->description }}</textarea>
                        </div>
                        <div class="form-group mb-4">
                            <label for="cover">Cover</label>
                            <input type="file" class="form-control" id="cover" name="cover">
                        </div>
                        <div class="form-group mb-2">
                            <label for="file">File</label>
                            <input type="file" class="form-control" name="file" id="file" placeholder="Masukkan File">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
