<div class="container-fluid g-0">
    <div class="row">
        <div class="col-lg-12 p-0">
            <div class="header_iner d-flex justify-content-between align-items-center">
                <div class="sidebar_icon d-lg-none">
                    <i class="ti-menu"></i>
                </div>
                <div class="serach_field-area">
                </div>
                <div class="header_right d-flex justify-content-between align-items-center">
                    {{-- <div class="header_notification_warp d-flex align-items-center">
                        <li>
                            <a href="#"> <img src="{{ asset('img/icon/bell.svg') }}" alt=""> </a>
                        </li>
                        <li>
                            <a href="#"> <img src="{{ asset('img/icon/msg.svg') }}" alt=""> </a>
                        </li>
                    </div> --}}
                    <div class="profile_info">
                        <img src="{{ asset('photo_user/' . (Auth::guard('student')->check() ? Auth::guard('student')->user()['photo_user'] : Auth::guard('teacher')->user()['photo_user'])) }}"
                            width="60" height="60">
                        <div class="profile_info_iner">
                            <p>
                                @if (Auth::guard('student')->check())
                                    Siswa
                                @elseif (Auth::guard('teacher')->check())
                                    Guru
                                @endif
                            </p>

                            @if (Auth::guard('student')->check())
                                <h5>{{ Auth::guard('student')->user()['name'] }}</h5>
                                <div class="profile_info_details">
                                    <a href="/student/profile">Edit Profile <i class="ti-user"></i></a>
                                    <a href="/logout">Log Out <i class="ti-shift-left"></i></a>
                                </div>
                            @elseif (Auth::guard('teacher')->check())
                                <h5>{{ Auth::guard('teacher')->user()['name'] }}</h5>
                                <div class="profile_info_details">
                                    <a href="/teacher/profile">Edit Profile <i class="ti-user"></i></a>
                                    <a href="/logout">Log Out <i class="ti-shift-left"></i></a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
