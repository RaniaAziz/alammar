<!doctype html>
<html lang="en" dir="rtl" data-dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="keyword" content="">
    <meta name="author" content="">
    <meta name="robots" content="index, follow">

    <meta name="geo.position" content="">
    <meta name="geo.placename" content="">
    <meta name="geo.region" content="">

    <meta property="og:type" content=""/>
    <meta property="og:title" content=""/>
    <meta property="og:description" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>

    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="">
    <meta name="twitter:site" content="">
    <meta name="twitter:creator" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href=""/>

    <link rel="stylesheet" href="{{url('')}}/assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="{{url('')}}/assets/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="{{url('')}}/assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{url('')}}/assets/css/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="{{url('')}}/assets/css/toastr.css">
    <link rel="stylesheet" href="{{url('')}}/assets/css/custom.css">
    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">

    <link rel="shortcut icon" href="{{url('')}}/assets/img/logo.svg" type="image/x-icon" >
    <title> Alammar | {{ meta('page-title') }}</title>
    <style>
        [v-cloak] {
            display: none;
        }

    </style>
    @stack('styles')
</head>
<body>
<div id="wrapper" class="toggled" >

    <!-- Sidebar -->
         @include('layout.menu')
    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
        <div  id="app" v-cloak>
            <div class="container-fluid">
                <nav class="navbar navbar-light main-navbar navbar-expand justify-content-between">
                    <div class="head d-flex">
                        <a href="#menu-toggle" class="navbar-brand menu-toggle"><span class="navbar-toggler-icon"></span></a>

                        <h1 class="page-title">{{ meta('breadcrumbs-title') }}</h1>
                    </div>
                    <div class="action">
{{--                        <div class="website-name mr-md-4 mr-3">--}}
{{--                            <div class="dropdown user-dropdown">--}}
{{--                                <button class="btn bg-transparent border-0 dropdown-toggle no-after" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                    <div class="d-block text-right">--}}
{{--                                        <h2 class="website-title">Above Co</h2>--}}
{{--                                        <p class="website-domain">www.above.sa</p>--}}
{{--                                    </div>--}}
{{--                                </button>--}}
{{--                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">--}}
{{--                                    <a class="dropdown-item" href="#">--}}
{{--                                        <h2 class="website-title">Above Co</h2>--}}
{{--                                        <p class="website-domain">www.above.sa</p>--}}
{{--                                    </a>--}}
{{--                                    <a class="dropdown-item" href="#">--}}
{{--                                        <h2 class="website-title">Above Co</h2>--}}
{{--                                        <p class="website-domain">www.above.sa</p>--}}
{{--                                    </a>--}}
{{--                                    <a class="dropdown-item" href="#">--}}
{{--                                        <h2 class="website-title">Above Co</h2>--}}
{{--                                        <p class="website-domain">www.above.sa</p>--}}
{{--                                    </a>--}}
{{--                                    <a class="dropdown-item" href="#">--}}
{{--                                        <h2 class="website-title">Above Co</h2>--}}
{{--                                        <p class="website-domain">www.above.sa</p>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <a href="#!" target="_blank" rel="noopener noreferrer" class="btn btn-primary px-md-4 px-2 mr-md-4 mr-3" title="معاينة الموقع">
                            <img src="{{url('')}}/assets/img/blank.svg" alt="blank">
                            <span class="d-md-block d-none ml-3">معاينة الموقع</span>
                        </a>

                        <div class="dropdown user-dropdown">
                            <a href="#!" class="dropdown-toggle mr-md-4 mr-3" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
{{--                                <div class="user-pic">--}}
{{--                                    <img src="{{url('')}}/assets/img/user-pic.png" alt="user-pic">--}}

{{--                                </div>--}}
                                <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3"> مرحبا {{auth()->guard('web')->user()->name}}</span>


                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                <a class="dropdown-item" href="#">حسابي</a>
{{--                                <a class="dropdown-item" href="#">تغيير كلمة المرور</a>--}}
{{--                                <a class="dropdown-item" href="#">الاعدادات</a>--}}
{{--                                <a class="dropdown-item" href="#">الاشعارات</a>--}}
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    تسجيل خروج
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
{{--                        <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3"> مرحبا {{auth()->guard('web')->user()->name}}</span>--}}

{{--                        <a class="btn btn-light text-danger" href="{{ route('logout') }}"--}}
{{--                           onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                            تسجيل خروج--}}
{{--                        </a>--}}
{{--                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                            @csrf--}}
{{--                        </form>--}}
{{--                        <a href="#!" class="btn btn-light" title="en language"> En</a>--}}
                    </div>
                </nav>
                @yield('content')

            </div>

        </div><!-- /#page-content-wrapper -->

    <!-- /#page-content-wrapper -->

</div> <!-- /#wrapper -->
{{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKnPa0yzHNvXT52WV1qc-1T2rEYOTkrd8&callback=initMap"></script>--}}
{{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKnPa0yzHNvXT52WV1qc-1T2rEYOTkrd8&libraries=drawing,geometry"></script>--}}
<script src="https://maps.googleapis.com/maps/api/js?key=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&libraries=drawing,geometry"></script>

{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" ></script>--}}
{{--<script src="{{url('')}}/assets/js/jquery-3.1.0.js" ></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>--}}
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="{{url('')}}/assets/js/bootstrap-datepicker.min.js"></script>
<script src="{{url('')}}/assets/js/bootstrap-select.min.js"></script>
<script src="{{url('')}}/assets/js/bootstrap-tagsinput.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
<script src="{{url('')}}/assets/ckeditor/ckeditor.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.1/chart.min.js"></script>

<script src="{{url('')}}/assets/js/sweetalert2.js"></script>
<script src="{{url('')}}/assets/js/toastr.min.js"></script>
{{--<script src="{{url('')}}/assets/js/custom.js"></script>--}}
<script>
    const LOCALE = "{{ app()->getLocale() }}";
    let BASE_URL = "{{ url('/') }}";
    let CURRENT_USER = {!! auth()->check() ? auth()->user() : 'null' !!};
    const c_token = '{{ csrf_token() }}';
    window.MyApp = {!! json_encode(array_merge(getTranslationsJs(), [])) !!};
</script>
<script src="{{url('')}}{{ mix('js/app.js') }}"></script>
@stack('scripts')
<script>
    /*
        Doughnut Charts
    */
    const data = {
        labels: [
            'Iphone',
            'Computer',
            'Android'
        ],
        datasets: [{
            label: 'My First Dataset',
            data: [300, 50, 100],
            backgroundColor: [
                '#24AEFC',
                '#43E0AA',
                '#935CCB'
            ],
            hoverOffset: 4
        }]
    };
    const config = {
        type: 'doughnut',
        data,
        options: {
            weight: "2px"
        }
    };
    var myChart = new Chart(
        document.getElementById('doughnut'),
        config
    );

    /*
        line
    */
    const data1 = {
        labels: ['2013', '2014', '2015','2016', '2017', '2018', '2019'],

        datasets: [{
            label: 'Iphone',
            data: [65, 59, 80, 81, 56, 55, 40],
            fill: false,
            borderColor: '#24AEFC',
            tension: 0.1
        }, {
            label: 'Computer',
            data: [45, 79, 90, 41, 96, 15, 30],
            fill: false,
            borderColor: '#43E0AA',
            tension: 0.1
        }, {
            label: 'Android',
            data: [25, 39, 50, 31, 76, 45, 51],
            fill: false,
            borderColor: '#935CCB',
            tension: 0.1
        }]
    };
    const config2 = {
        type: 'line',
        data : data1,
        options: {}
    };
    var myChart2 = new Chart(
        document.getElementById('line'),
        config2
    );
    /*
               var name_of_page = "name_of_page";
               $('.sidebar-nav a').removeClass("active");
               $('.sidebar-nav a[id="'+name_of_page+'"]').addClass("active");
   */
</script>

</body>
</html>
