<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title>@yield('title')</title>

<!-- General CSS Files -->
{{-- <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('/css/all.css') }}" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> --}}

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<!-- Template CSS -->
<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('/css/components.css') }}">
</head>

<body>
<div id="app">
    <div class="main-wrapper">
    <div class="navbar-bg"></div>
    <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            {{-- <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li> --}}
        </ul>
        <div class="search-element">
            {{-- <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250"> --}}
            {{-- <button class="btn" type="submit"><i class="fas fa-search"></i></button> --}}
            {{-- <div class="search-backdrop"></div> --}}
            {{-- Histori pencarian --}}
                {{-- <div class="search-result">
                    <div class="search-header">
                        Histories
                    </div>
                    <div class="search-item">
                        <a href="#">How to hack NASA using CSS</a>
                        <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                    </div>
                    <div class="search-item">
                        <a href="#">Kodinger.com</a>
                        <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                    </div>
                    <div class="search-item">
                        <a href="#">#Stisla</a>
                        <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                    </div>
                </div> --}}
            </div>
        </form>
        <ul class="navbar-nav navbar-right">
            {{-- Notifikasi Pesan --}}
        {{-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
            <div class="dropdown-header">Messages
                <div class="float-right">
                <a href="#">Mark All As Read</a>
                </div>
            </div>
            <div class="dropdown-list-content dropdown-list-message">
                <a href="#" class="dropdown-item dropdown-item-unread">
                <div class="dropdown-item-avatar">
                    <img alt="image" src="{{ asset('/img/avatar/avatar-1.png') }}" class="rounded-circle">
                    <div class="is-online"></div>
                </div>
                <div class="dropdown-item-desc">
                    <b>Kusnaedi</b>
                    <p>Hello, Bro!</p>
                    <div class="time">10 Hours Ago</div>
                </div>
                </a>
                <a href="#" class="dropdown-item dropdown-item-unread">
                <div class="dropdown-item-avatar">
                    <img alt="image" src="../assets/img/avatar/avatar-2.png" class="rounded-circle">
                </div>
                <div class="dropdown-item-desc">
                    <b>Dedik Sugiharto</b>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                    <div class="time">12 Hours Ago</div>
                </div>
                </a>
                <a href="#" class="dropdown-item dropdown-item-unread">
                <div class="dropdown-item-avatar">
                    <img alt="image" src="../assets/img/avatar/avatar-3.png" class="rounded-circle">
                    <div class="is-online"></div>
                </div>
                <div class="dropdown-item-desc">
                    <b>Agung Ardiansyah</b>
                    <p>Sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <div class="time">12 Hours Ago</div>
                </div>
                </a>
                <a href="#" class="dropdown-item">
                <div class="dropdown-item-avatar">
                    <img alt="image" src="../assets/img/avatar/avatar-4.png" class="rounded-circle">
                </div>
                <div class="dropdown-item-desc">
                    <b>Ardian Rahardiansyah</b>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit ess</p>
                    <div class="time">16 Hours Ago</div>
                </div>
                </a>
                <a href="#" class="dropdown-item">
                <div class="dropdown-item-avatar">
                    <img alt="image" src="../assets/img/avatar/avatar-5.png" class="rounded-circle">
                </div>
                <div class="dropdown-item-desc">
                    <b>Alfa Zulkarnain</b>
                    <p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                    <div class="time">Yesterday</div>
                </div>
                </a>
            </div>
            <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
            </div>
            </div>
        </li> --}}
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
            <div class="dropdown-header">Notifikasi
                <div class="float-right">
                <a href="#">Mark All As Read</a>
                </div>
            </div>
            <div class="dropdown-list-content dropdown-list-icons">
                <a href="#" class="dropdown-item">
                <div class="dropdown-item-icon bg-info text-white">
                    <i class="far fa-user"></i>
                </div>
                <div class="dropdown-item-desc">
                    <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                    <div class="time">10 Hours Ago</div>
                </div>
                </a>
            </div>
            <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
            </div>
            </div>
        </li>
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ asset('/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->nama }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
            {{-- <div class="dropdown-title">Logged in 5 min ago</div> --}}
            <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profil
            </a>
            {{-- <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Aktifitas
            </a>
            <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Setting
            </a> --}}
            <div class="dropdown-divider"></div>
            <a class="dropdown-item has-icon text-danger"  href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">

                <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            </div>
        </li>
        </ul>
    </nav>
    <div class="main-sidebar">
        <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html"><img src="/img/dea2.jpeg" width="220" alt="logo brand"></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html"><img src="/img/dea1.jpeg" width="20" alt="logo brand"></a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Beranda</li>
            <li class="{{ Request::segment(1) == 'home' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fas fa-fire"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-header">Data Anggota</li>
            <li class="{{ Request::segment(1) == 'guru' ? 'active' : '' }}"><a class="nav-link" href="{{ route('guru.index') }}"><i class="fas fa-user-graduate"></i> <span>Data Guru</span></a></li>
            <li class="{{ Request::segment(1) == 'siswa' ? 'active' : '' }}"><a class="nav-link" href="{{ route('siswa.index') }}"><i class="fas fa-users"></i> <span>Data Siswa</span></a></li>

            <li class="menu-header">Kurikulum</li>
            <li class="{{ Request::segment(1) == 'kelas' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('kelas.index') }}">
                <i class="fas fa-school"></i>
                <span>Data Kelas</span>
                </a>
            </li>
            <li class="{{ Request::segment(1) == 'mapel' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('mapel.index') }}">
                <i class="fas fa-book"></i>
                <span>Data Mapel</span>
                </a>
            </li>
            <li class="{{ Request::segment(1) == 'eks' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('eks.index') }}">
                    <i class="fas fa-baseball-ball"></i>
                    <span>Data Ekstrakulikuler</span>
                </a>
            </li>
            <li><a class="nav-link" href="credits.html"><i class="fas fa-bowling-ball"></i><span>Nilai Ekstrakulikuler</span></a></li>
            <li><a class="nav-link" href="credits.html"><i class="fas fa-bookmark"></i><span>Nilai KD</span></a></li>
            <li><a class="nav-link" href="credits.html"><i class="fas fa-tablet"></i><span>Data Nilai</span></a></li>
            <li class="menu-header">Administrator</li>
            <li><a class="nav-link" href="credits.html"><i class="fas fa-wrench"></i><span>Rules Sistem</span></a></li>
        </ul>
        </aside>
    </div>


    <i class="fa-duotone fa-block-question"></i>
    <!-- Main Content -->
    @yield('content')

    <footer class="main-footer">
        <div class="footer-left">
            Copyright &copy; E-Sar 2022
        </div>
    </footer>
    </div>
</div>

<!-- General JS Scripts -->
<script src="{{ asset('/js/jquery-3.3.1.min.js') }}" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="{{ asset('/js/popper.min.js') }}" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="{{ asset('/js/bootstrap.min.js') }}" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="{{ asset('/js/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('/js/moment.min.js') }}"></script>
<script src="{{ asset('/js/stisla.js') }}"></script>

<!-- JS Libraies -->

<!-- Template JS File -->
<script src="{{ asset('/js/scripts.js') }}"></script>
<script src="{{ asset('/js/custom.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('/js/page/auth-register.js') }}"></script>

</body>
</html>
