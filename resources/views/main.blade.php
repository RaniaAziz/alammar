@extends('layout.app')

@section('content')

    <div class="page-content">
        <div class="row">
            <div class="col-lg-3">
                <div class="card" style="padding: 15PX;">
                    <a href="{{url('offers')}}" >
                    <div class="card-body">
                        <h5 class="text-info"><center> {{$of_no}}</center></h5>

                    </div>
                    <div class="card-head">
                        <h5 style="color: #0b2e13"><center> العروض المضافة</center></h5>
                    </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card" style="padding: 15PX;">
                    <a href="{{url('orders')}}" >
                    <div class="card-body">
                        <h5  style="color:purple"><center> {{$or_no}}</center></h5>

                    </div>
                    <div class="card-head">
                        <h5 style="color: #0b2e13"><center> الطلبات المضافة</center></h5>
                    </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card" style="padding: 15PX;">
                    <a href="{{url('clients')}}" >
                    <div class="card-body">
                        <h5  style="color: lightgreen"><center> {{$c_no}}</center></h5>

                    </div>
                    <div class="card-head">
                        <h5 style="color: #0b2e13"><center> العملاء </center></h5>
                    </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card" style="padding: 15PX;">
                    <a href="{{url('posters')}}" >
                    <div class="card-body">
                        <h5 class="text-warning"><center> {{$p_no}}</center></h5>

                    </div>
                    <div class="card-head">
                        <h5 style="color: #0b2e13"><center> اللوحات المضافة</center></h5>
                    </div>
                    </a>
                </div>
            </div>
        </div>
{{--        <div class="row chart-card">--}}
{{--            <div class="col-lg-4">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-head">--}}
{{--                        <h2 class="title">مصادر الدخول</h2>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <canvas id="doughnut"></canvas>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-8">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-head">--}}
{{--                        <h2 class="title">المشاهدات والزيارات</h2>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <canvas id="line"></canvas>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
@endsection
