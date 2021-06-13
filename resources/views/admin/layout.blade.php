<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Bantuan Covid 19 Desa</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
{{--    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">--}}

    <!-- CSS Counterup -->
    <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/css/style.css')}}" rel="stylesheet" type="text/css" />


<!-- datatables-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
{{--    <script src="{{asset("asset2/js/scripts.js")}}"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" crossorigin="anonymous"></script>--}}
{{--    <script src="assets/demo/chart-area-demo.js"></script>--}}
{{--    <script src="{{asset("asset2/assets/demo/chart-bar-demo.js")}}"></script>--}}
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="{{asset("asset2/assets/demo/datatables-demo.js")}}"></script>
{{--    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" crossorigin="anonymous"></script>--}}
{{--    <script src="{{asset("asset2/assets/demo/date-range-picker-demo.js")}}"></script>--}}

{{--    <script src="{{asset("asset2/js/sb-customizer.js")}}"></script>--}}



{{--    <script src="{{asset('admin/assets/js/jquery.core.js')}}"></script>--}}
{{--    <script src="{{asset('admin/assets/js/jquery.app.js')}}"></script>--}}

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.18/dist/css/bootstrap-select.min.css">.
{{--    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">--}}
{{--    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.24/b-1.7.0/cr-1.5.3/date-1.0.3/sb-1.0.1/sp-1.2.2/sl-1.3.3/datatables.min.css">--}}
    <!-- Template CSS -->
{{--    {{asset('assets/css/style.css')}}--}}
{{--    {{asset('assets/css/components.css')}}--}}
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
</head>

<body>
<div id="app">
    <div class="main-wrapper">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                </ul>
            </form>
            <ul class="navbar-nav navbar-right">

            </ul>
        </nav>
        <div class="main-sidebar">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="{{route('dashboard')}}">Bantuan Covid19 Desa</a>
                </div>
                <div class="sidebar-brand sidebar-brand-sm">
                    <a href="{{route('dashboard')}}">BCDS</a>
                </div>
                <ul class="sidebar-menu">
                    <li class="menu-header">HomePage</li>
                    @if(auth()->user()->role == "superadmin")
                        <li class="nav-item dropdown">
                            <a href="{{route("data-akun")}}" class="nav-link"><i class="fas fa-address-card"></i> <span>Data Akun</span></a>
                        </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a href="{{route("penerima")}}" class="nav-link"><i class="fas fa-calendar"></i> <span>Histori Penerima</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('hasilrekomendasi')}}" class="nav-link"><i class="fas fa-database"></i> <span>hasil rekomendasi</span></a>
                    </li>
                    @if(auth()->user()->role == "admin" or auth()->user()->role == "superadmin")

                    <li class="nav-item dropdown">
                        <a href="{{route('dashboard')}}" class="nav-link"><i class="fas fa-columns"></i> <span>Data Kependudukan</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i> <span>SAW</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="{{route("matrixnilai")}}">Matrix Nilai</a></li>
                            <li><a class="nav-link" href="{{route("matrixnormalisasi")}}">Matrix Normalisasi</a></li>
                            <li><a class="nav-link" href="{{route("matrixpreferensi")}}">Matrix Referensi</a></li>
                        </ul>
                    </li>
{{--                    <li class="active">--}}
{{--                        <a href="{{route('dashboard')}}" class="nav-link"><i class="fas fa-book"></i> <span>SAW</span></a>--}}
{{--                    </li>--}}
                    <li class="nav-item">
                        <a href="{{route('setting')}}" class="nav-link"><i class="fas fa-cog"></i> <span>kriteria</span></a>
                    </li>
                    @endif
                </ul>

                <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                    <a class="btn btn-primary btn-lg btn-block btn-icon-split" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </aside>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                @yield('kontenoperator')
            </section>
        </div>
        <footer class="main-footer">
            <div class="footer-left">
               Bantuan Covid 19 Desa
            </div>
        </footer>
    </div>
</div>

<!-- General JS Scripts -->

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.24/b-1.7.0/cr-1.5.3/date-1.0.3/sb-1.0.1/sp-1.2.2/sl-1.3.3/datatables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="{{url('/')}}/assets/js/stisla.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>



<!-- Js dattable -->
{{--<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>--}}
{{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>--}}
{{--<script src="{{asset("asset2/js/scripts.js")}}"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" crossorigin="anonymous"></script>--}}
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="{{asset("asset2/demo/datatables-demo.js")}}"></script>
{{--<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" crossorigin="anonymous"></script>--}}
{{--<script src="{{asset("asset2/demo/date-range-picker-demo.js")}}"></script>--}}

{{--<script src="{{asset("asset2/js/sb-customizer.js")}}"></script>--}}

<!-- Counter number -->
<script src="{{asset('admin/plugins/waypoints/lib/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('admin/plugins/counterup/jquery.counterup.min.js')}}"></script>


<!-- App js -->
<script src="{{asset('admin/assets/js/jquery.core.js')}}"></script>
<script src="{{asset('admin/assets/js/jquery.app.js')}}"></script>

<!-- Template JS File -->
<script src="{{url('/')}}/assets/js/scripts.js"></script>
<script src="{{url('/')}}/assets/js/custom.js"></script>

<!-- Page Specific JS File -->
</body>
</html>
