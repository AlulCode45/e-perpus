@extends('dashboard.app')
@section('title', 'Kelola Buku')
@section('content')
    <div class="QA_section mt-3">
        <div class="white_box_tittle list_header">
            <h4>Data Buku</h4>
            <div class="box_right d-flex lms_block">
                <div class="serach_field_2">
                </div>
                <div class="add_button ms-2">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#addBook" class="btn_1">Tambah Buku</a>
                </div>
            </div>
        </div>
    </div>
    <div class="kelola-buku">
        <div class="row">
            @foreach ($books as $book)
                <div class="col-md-4">
                    <div class="card text-white card-has-bg click-col"
                        style="background-image:url('{{ asset('book/cover/' . $book->cover) }}');">
                        <img class="card-img d-none" src="{{ asset('book/cover/' . $book->cover) }}">
                        <div class="card-img-overlay d-flex flex-column">
                            <div class="card-body">
                                <small
                                    class="card-meta mb-2">{{ $categoryModel::find($book->id_category)->category_name }}</small>
                                <h4 class="card-title mt-0 "><a class="text-white"
                                        href="/teacher/book/{{ $book->id }}">{{ $book->title }}</a>
                                </h4>
                                <small><i class="far fa-clock"></i> {{ $book->published_date }}</small>
                            </div>
                            <div class="card-footer">
                                <div class="media">
                                    <div class="media-body">
                                        <h6 class="my-0 text-white d-block">{{ $book->author }}</h6>
                                        <small>{{ $book->publisher }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="modal fade" id="addBook" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/teacher/add-book" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="title">Judul Buku</label>
                            <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelpId"
                                placeholder="Masukkan Judul Buku" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="author">Penulis</label>
                            <input type="text" class="form-control" name="author" id="author"
                                aria-describedby="emailHelpId" placeholder="Masukkan Penulis" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="publisher">Penerbit</label>
                            <input type="text" class="form-control" name="publisher" id="publisher"
                                aria-describedby="emailHelpId" placeholder="Masukkan Penerbit">
                        </div>
                        <div class="form-group mb-2">
                            <label for="published_date">Tanggal Terbit</label>
                            <input type="date" class="form-control" name="published_date" id="published_date"
                                aria-describedby="emailHelpId" placeholder="Masukkan Tanggal Terbit">
                        </div>
                        <div class="form-group mb-2">
                            <label for="cover">Cover</label>
                            <input type="file" class="form-control" name="cover" id="cover" aria-describedby="emailHelpId"
                                placeholder="Masukkan Cover" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="category">Kategori</label>
                            <select class="form-control" name="category" id="category" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($categoryModel::all() as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="description">Deskripsi</label>
                            <textarea class="form-control" name="description" id="description" rows="3" placeholder="Masukkan Deskripsi"
                                required></textarea>
                        </div>
                        <div class="form-group mb-2">
                            <label for="file">File</label>
                            <input type="file" class="form-control" name="file" id="file" aria-describedby="emailHelpId"
                                placeholder="Masukkan File" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
