@extends('layout.app')

@section('content')
    <div class="page-content-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-right mb-4">
                    <a href="services-add.html" class="btn btn-warning text-white"> <i class="fa fa-plus mr-2"></i> اضافة</a>
                    <a href="services-config.html" class="btn btn-secondary" title="اعدادات صفحة الخدمات" data-toggle="tooltip"> <i class="fas fa-cog"></i></a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="table">
                                <thead>
                                <tr>
                                    <th>الخدمة</th>
                                    <th>الحالة</th>
                                    <th>الاجراء</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="d-flex align-items-center">
                                        <span class="sort-btn mr-3"><a href="#!" class="drag-handle ui-sortable-handle"><img src="assets/img/sort.svg" alt="sort"></a></span>
                                        <div class="product-box">
                                            <div class="product-pic mr-3">
                                                <img src="assets/img/services/Group 9761.svg" alt="">
                                            </div>
                                            <div class="product-content">
                                                <h2 class="title">ترحيب الاولى</h2>
                                                <p class="info">وصف العنوان الفرعي للشريحة هنا</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <label class="label-switch switch-success">
                                            <input type="checkbox" class="switch switch-bootstrap status" name="slider-4" id="status" value="1" checked>
                                            <span class="lable"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a href="services-add.html" class="btn btn-light px-4 border"> تعديل</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="d-flex align-items-center">
                                        <span class="sort-btn mr-3"><a href="#!" class="drag-handle ui-sortable-handle"><img src="assets/img/sort.svg" alt="sort"></a></span>
                                        <div class="product-box">
                                            <div class="product-pic mr-3">
                                                <img src="assets/img/services/Group 9762.svg" alt="">
                                            </div>
                                            <div class="product-content">
                                                <h2 class="title">ترحيب الاولى</h2>
                                                <p class="info">وصف العنوان الفرعي للشريحة هنا</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <label class="label-switch switch-success">
                                            <input type="checkbox" class="switch switch-bootstrap status" name="slider-4" id="status" value="1" checked>
                                            <span class="lable"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a href="services-add.html" class="btn btn-light px-4 border"> تعديل</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="d-flex align-items-center">
                                        <span class="sort-btn mr-3"><a href="#!" class="drag-handle ui-sortable-handle"><img src="assets/img/sort.svg" alt="sort"></a></span>
                                        <div class="product-box">
                                            <div class="product-pic mr-3">
                                                <img src="assets/img/services/Group 9763.svg" alt="">
                                            </div>
                                            <div class="product-content">
                                                <h2 class="title">ترحيب الاولى</h2>
                                                <p class="info">وصف العنوان الفرعي للشريحة هنا</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <label class="label-switch switch-success">
                                            <input type="checkbox" class="switch switch-bootstrap status" name="slider-4" id="status" value="1" checked>
                                            <span class="lable"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a href="services-add.html" class="btn btn-light px-4 border"> تعديل</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="d-flex align-items-center">
                                        <span class="sort-btn mr-3"><a href="#!" class="drag-handle ui-sortable-handle"><img src="assets/img/sort.svg" alt="sort"></a></span>
                                        <div class="product-box">
                                            <div class="product-pic mr-3">
                                                <img src="assets/img/services/Group 9764.svg" alt="">
                                            </div>
                                            <div class="product-content">
                                                <h2 class="title">ترحيب الاولى</h2>
                                                <p class="info">وصف العنوان الفرعي للشريحة هنا</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <label class="label-switch switch-success">
                                            <input type="checkbox" class="switch switch-bootstrap status" name="slider-4" id="status" value="1" checked>
                                            <span class="lable"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a href="services-add.html" class="btn btn-light px-4 border"> تعديل</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
