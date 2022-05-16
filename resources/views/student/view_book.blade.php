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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
