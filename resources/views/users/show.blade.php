@extends('layout.app')

@section('content')
    <users-show   :item='{!! isset($item) ? $item->toJson() : 'null' !!}' inline-template >
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-right mb-4">
                        <a  :href="`{{asset('')}}users/${item.id}/edit`" class="btn btn-primary text-white"> تعديل </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">

                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label">اسم الموظف</label>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="" class="form-text "><strong>@{{ item.name }}</strong></label>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label">رقم الجوال </label>
                                            </div>
                                            <div class="col-lg-6">

                                                <label for="" class="form-text "><strong>@{{ item.mobile }}</strong></label>


                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label"> البريد الالكتروني</label>
                                            </div>
                                            <div class="col-lg-6">

                                                <label for="" class="form-text "><strong>@{{ item.email }}</strong></label>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                </div>
            </div>
        </div>

    </users-show>

@endsection
