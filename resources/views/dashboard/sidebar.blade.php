<nav class="sidebar">
    <div class="logo d-flex justify-content-between">
        <a href="index.html"><img src="{{ asset('img/logo.png') }}" alt=""></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <li class="side_menu_title">
            <span>Dashboard</span>
        </li>
        <li class="mm-active">
            <a href="{{ Auth::guard('student')->check() ? '/student' : '/teacher' }}">
                <img src="{{ asset('img/menu-icon/1.svg') }}" alt="">
                <span>Dashboard</span>
            </a>
        </li>
        @if (Auth::guard('student')->check())
        @else
            <li class="">
                <a href="{{ route('teacher.kelola_kategori') }}">
                    <i class="fa fa-list-alt"></i>
                    <span>Kelola Kategori</span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('teacher.kelola_buku') }}">
                    <i class="fa fa-book"></i>
                    <span>Kelola Buku</span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('teacher.kelola_siswa') }}">
                    <i class="fa fa-users"></i>
                    <span>Kelola Siswa</span>
                </a>
            </li>
        @endif
    </ul>
</nav>
