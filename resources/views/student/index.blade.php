@extends('dashboard.app')
@section('title', 'Dashboard Siswa')
@section('content')
    <div class="QA_section mt-3">
        <div class="white_box_tittle list_header">
            <h4>Data Buku</h4>
            <div class="box_right d-flex lms_block">
                <div class="serach_field_2">
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
                                        href="/student/book/{{ $book->id }}">{{ $book->title }}</a>
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
@endsection
