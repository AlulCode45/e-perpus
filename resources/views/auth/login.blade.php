<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="img/logo.png" type="image/png">
    <style>
        html {
            background: #fff;
        }

    </style>
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
</head>

<body>

    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_box">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">

                                <div class="modal-content cs_modal">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Log in</h5>
                                    </div>
                                    @if (session()->has('error'))
                                        <div class="alert alert-danger">{{ session()->get('error') }}</div>
                                    @else
                                    @endif
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('login_action') }}">
                                            @csrf
                                            <div class="">
                                                <input type="email" class="form-control"
                                                    placeholder="Enter your email" name="email"
                                                    value="{{ old('email') }}" autofocus required>
                                            </div>
                                            <div class="">
                                                <input type="password" class="form-control" placeholder="Password"
                                                    name="password" required>
                                            </div>
                                            <div class="">
                                                <select class="form-control" name="user_type" required>
                                                    <option value="">Pilih Type User</option>
                                                    <option value="student">Murid</option>
                                                    <option value="teacher">Guru</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn_1 full_width text-center">Masuk</button>
                                            <p>Belum Punya akun? <a data-bs-toggle="modal" data-bs-target="#sing_up"
                                                    data-bs-dismiss="modal" href="#"> Daftar</a></p>
                                            <div class="text-center">
                                                <a href="/reset-password" class="pass_forget_btn">Lupa Password?</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



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
</body>

</html>
