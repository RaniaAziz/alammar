@extends('layout.app')

@section('content')
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <nav class="navbar navbar-light main-navbar navbar-expand justify-content-between">
                <div class="head d-flex">
                    <a href="#menu-toggle" class="navbar-brand menu-toggle"><span class="navbar-toggler-icon"></span></a>

                    <h1 class="page-title"> رئيسية التحكم</h1>
                </div>
                <div class="action">

                    <div class="website-name mr-md-4 mr-3">
                        <div class="dropdown user-dropdown">
                            <button class="btn bg-transparent border-0 dropdown-toggle no-after" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="d-block text-right">
                                    <h2 class="website-title">Above Co</h2>
                                    <p class="website-domain">www.above.sa</p>
                                </div>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                <a class="dropdown-item" href="#">
                                    <h2 class="website-title">Above Co</h2>
                                    <p class="website-domain">www.above.sa</p>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <h2 class="website-title">Above Co</h2>
                                    <p class="website-domain">www.above.sa</p>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <h2 class="website-title">Above Co</h2>
                                    <p class="website-domain">www.above.sa</p>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <h2 class="website-title">Above Co</h2>
                                    <p class="website-domain">www.above.sa</p>
                                </a>
                            </div>
                        </div>
                    </div>

                    <a href="#!" target="_blank" rel="noopener noreferrer" class="btn btn-primary px-md-4 px-2 mr-md-4 mr-3" title="معاينة الموقع">
                        <img src="assets/img/blank.svg" alt="blank">
                        <span class="d-md-block d-none ml-3">معاينة الموقع</span>
                    </a>

                    <div class="dropdown user-dropdown">
                        <a href="#!" class="dropdown-toggle mr-md-4 mr-3" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="user-pic">
                                <img src="assets/img/user-pic.png" alt="user-pic">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                            <a class="dropdown-item" href="#">حسابي</a>
                            <a class="dropdown-item" href="#">تغيير كلمة المرور</a>
                            <a class="dropdown-item" href="#">الاعدادات</a>
                            <a class="dropdown-item" href="#">الاشعارات</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="#">تسجيل خروج</a>
                        </div>
                    </div>

                    <a href="#!" class="btn btn-light" title="en language"> En</a>
                </div>
            </nav>

            <div class="page-content-wrapper">
                <div class="row chart-card">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-head">
                                <h2 class="title">مصادر الدخول</h2>
                            </div>
                            <div class="card-body">
                                <canvas id="doughnut"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-head">
                                <h2 class="title">المشاهدات والزيارات</h2>
                            </div>
                            <div class="card-body">
                                <canvas id="line"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /#page-content-wrapper -->
    </div> <!-- /#wrapper -->
@endsection
