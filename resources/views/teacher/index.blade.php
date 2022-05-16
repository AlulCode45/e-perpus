@extends('dashboard.app')
@section('title', 'Guru')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="single_element">
                <div class="quick_activity">
                    <div class="row">
                        <div class="col-12">
                            <div class="quick_activity_wrap">
                                <div class="single_quick_activity d-flex">
                                    <div class="icon">
                                        <img src="img/icon/man.svg" alt="">
                                    </div>
                                    <div class="count_content">
                                        <h3><span class="counter">{{ $total_student }}</span> </h3>
                                        <p>Siswa</p>
                                    </div>
                                </div>
                                <div class="single_quick_activity d-flex">
                                    <div class="icon">
                                        <img src="img/icon/book.svg" alt="">
                                    </div>
                                    <div class="count_content">
                                        <h3><span class="counter">{{ $total_book }}</span> </h3>
                                        <p>Buku</p>
                                    </div>
                                </div>
                                <div class="single_quick_activity d-flex">
                                    <div class="icon">
                                        <img src="img/icon/filter.svg" alt="">
                                    </div>
                                    <div class="count_content">
                                        <h3><span class="counter">{{ $total_category }}</span> </h3>
                                        <p>Kategori</p>
                                    </div>
                                </div>
                                <div class="single_quick_activity d-flex">
                                    <div class="icon">
                                        <img src="img/icon/pharma.svg" alt="">
                                    </div>
                                    <div class="count_content">
                                        <h3><span class="counter">{{ $total_teacher }}</span> </h3>
                                        <p>Guru</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12 mb-5">
        <div class="white_box card_height_100">
            <div class="box_header border_bottom_1px  ">
                <div class="main-title">
                    <h3 class="mb_25">Semua Siswa</h3>
                </div>
            </div>
            <div class="staf_list_wrapper sraf_active owl-carousel">
                @foreach ($students as $student)
                    <div class="single_staf">
                        <div class="staf_thumb">
                            <img src="{{ asset('photo_user/' . $student->photo_user) }}" alt="">
                        </div>
                        <h4>{{ $student->name }}</h4>
                        <p>{{ $student->class . ' / ' . $student->absent }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
