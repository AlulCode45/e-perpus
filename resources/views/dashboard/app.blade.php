<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" href="img/logo.png" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/bootstrap1.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/themefy_icon/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/swiper_slider/css/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/select2/css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/niceselect/css/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/owl_carousel/css/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/gijgo/gijgo.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/font_awesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/tagsinput/tagsinput.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/datatable/css/jquery.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/datatable/css/responsive.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/datatable/css/buttons.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/text_editor/summernote-bs4.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/morris/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/material_icon/material-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/colors/default.css') }}" id="colorSkinCSS">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.css'
        integrity='sha512-1hsteeq9xTM5CX6NsXiJu3Y/g+tj+IIwtZMtTisemEv3hx+S9ngaW4nryrNcPM4xGzINcKbwUJtojslX2KG+DQ=='
        crossorigin='anonymous' />
    <style>
        .dataTables_wrapper .dataTables_filter input {
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
        }

        .photo-siswa {
            width: 100%;
            height: 250px;
        }

        .kelola-buku .card {
            border: none;
            transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);
            overflow: hidden;
            border-radius: 20px;
            min-height: 350px;
            box-shadow: 0 0 12px 0 rgba(0, 0, 0, 0.2);
            margin-bottom: 50px;
        }

        @media (max-width: 768px) {
            .kelola-buku .card {
                min-height: 350px;
            }
        }

        @media (max-width: 420px) {
            .kelola-buku .card {
                min-height: 300px;
            }
        }

        .kelola-buku .card.card-has-bg {
            transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);
            background-size: 100%;
            background-repeat: no-repeat;
            background-position: center center;
        }

        .kelola-buku .card.card-has-bg:before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: inherit;
            -webkit-filter: grayscale(1);
            -moz-filter: grayscale(100%);
            -ms-filter: grayscale(100%);
            -o-filter: grayscale(100%);
            filter: brightness(50%);
        }

        .kelola-buku .card.card-has-bg:hover {
            transform: scale(0.98);
            box-shadow: 0 0 5px -2px rgba(0, 0, 0, 0.3);
            background-size: 130%;
            transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);
        }

        .kelola-buku .card.card-has-bg:hover .card-img-overlay {
            transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
            background: transparent;
            /* background: linear-gradient(0deg, rgba(4, 69, 114, 0.5) 0%, rgba(4, 69, 114, 1) 100%); */
        }

        .kelola-buku .card .card-footer {
            background: none;
            border-top: none;
        }

        .kelola-buku .card .card-footer .media img {
            border: solid 3px rgba(234, 95, 0, 0.3);
        }

        .kelola-buku .card .card-meta {
            color: orange;
        }

        .kelola-buku .card .card-body {
            transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);
        }

        .kelola-buku .card:hover {

            cursor: pointer;
            transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
        }

        .kelola-buku .card:hover .card-body {

            margin-top: 30px;
            transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
        }

        .kelola-buku .card .card-img-overlay {

            transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
            background: transparent;
            /* background: linear-gradient(0deg, rgba(35, 79, 109, 0.3785889355742297) 0%, rgba(69, 95, 113, 1) 100%); */
        }

        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: #fff;
        }

        .preloader .loading {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            font: 14px arial;
        }

    </style>
</head>

<body>
    <div class="preloader">
        <div class="loading">
            <center>
                <div class="spinner-grow text-info" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </center>
            <p>Harap Tunggu</p>
        </div>
    </div>
    @include('dashboard.sidebar')
    <section class="main_content dashboard_part">
        @include('dashboard.topbar')
        <div class="main_content_iner ">
            <div class="container-fluid">
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @elseif (Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @else
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @yield('content')
                <div class="footer_part">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="footer_iner text-center">
                                    <p>2022 © E-Perpus - Designed by <a href="#"> <i class="ti-heart"></i> </a><a
                                            href="https://alulcode45.github.io/">
                                            AlulCode</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('js/jquery1-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/popper1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap1.min.js') }}"></script>
    <script src="{{ asset('js/metisMenu.js') }}"></script>
    <script src="{{ asset('vendors/count_up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('vendors/chartlist/Chart.min.js') }}"></script>
    <script src="{{ asset('vendors/count_up/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('vendors/swiper_slider/js/swiper.min.js') }}"></script>
    <script src="{{ asset('vendors/niceselect/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('vendors/owl_carousel/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('vendors/gijgo/gijgo.min.js') }}"></script>
    <script src="{{ asset('vendors/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendors/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendors/datatable/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('vendors/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('vendors/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendors/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('vendors/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendors/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/chart.min.js') }}"></script>
    <script src="{{ asset('vendors/progressbar/jquery.barfiller.js') }}"></script>
    <script src="{{ asset('vendors/tagsinput/tagsinput.js') }}"></script>
    <script src="{{ asset('vendors/text_editor/summernote-bs4.js') }}"></script>
    <script src="{{ asset('vendors/apex_chart/apexcharts.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".preloader").fadeOut();
        })
    </script>
</body>

</html>
