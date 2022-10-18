
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

    <link rel="canonical" href=""/>

    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="assets/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="assets/css/toastr.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <link rel="shortcut icon" href="assets/img/logo.svg" type="image/x-icon" >
    <title> تسجيل الدخول - العمار العقارية </title>
</head>
<body>
<div id="login">
    <div class="container">
        <div class="row no-gutters justify-contnet-center align-items-center bg-white">
            <div class="col-lg-7">
                <div class="login-box">
                    <img src="assets/img/login.png" class="img-fluid" alt="">
                    <div class="login-box-content">
                        <h1 class="title text-uppercase">WELCOME BACK</h1>
                        <p class="info">Edite your website community that have more than 10000 subscribers and learn new things everyday</p>
                        <p class="info mb-0"><a href="#!" class="h5">Read more</a> about dsite.sa</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="login-form text-cetner">
                    <form action="{{ route('login') }}" method="post" class="needs-validation" >
                        @csrf
                        <div class="logo text-center mb-5">
                            <img src="assets/img/logo.svg" alt="logo">
                        </div>
                        <div class="text-header text-center  mb-5">
                            <h1 class="title">تسجيل دخول</h1>
                        </div>
                        <div class="form-group row mb-4">
                            <div class="icon">
                                <img src="assets/img/mail.svg" alt="">
                            </div>
                            <div class="col-lg-12">
                                <input type="email" name="email" class="form-control"  placeholder="example@domain.com" required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <div class="icon">
                                <img src="assets/img/padlock.svg" alt="">
                            </div>
                            <div class="col-lg-12">
                                <input type="password" name="password" class="form-control" placeholder="*************" required>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <div class="col-lg-9">
                                <button type="submit" class="btn btn-primary btn-block">تسجيل دخول</button>
                            </div>
                        </div>
                    </form>
{{--                    <div class="text-center">--}}
{{--                        <p class="forget">Forget your account? <a href="#!">Reset password</a></p>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</div>

<script src="assets/js/jquery-3.1.0.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="assets/js/bootstrap-datepicker.min.js"></script>
<script src="assets/js/bootstrap-select.min.js"></script>
<script src="assets/js/bootstrap-tagsinput.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
<script src="assets/ckeditor/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.1/chart.min.js"></script>
<script src="assets/js/sweetalert2.js"></script>
<script src="assets/js/toastr.min.js"></script>
{{--<script src="assets/js/custom.js"></script>--}}

</body>
</html>
