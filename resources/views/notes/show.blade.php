@extends('layout.app')

@section('content')
    <notes-show   :item='{!! isset($item) ? $item->toJson() : 'null' !!}' inline-template >
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-right mb-4">
                        <a  :href="`{{asset('')}}notes/${item.id}/edit`" class="btn btn-primary text-white"> تعديل </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">

                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label">رقم الطلب </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="" class="form-text "><strong>@{{ item.order.order_no }}</strong></label>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label"> الملاحظات  </label>
                                            </div>
                                            <div class="col-lg-6">

                                                <label for="" class="form-text ">
                                                    <strong>
                                                        @{{ item.notes }}
                                                    </strong>
                                                </label>


                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label"> الموظف الذي دون الملاحظات</label>
                                            </div>
                                            <div class="col-lg-6">

                                                <label for="" class="form-text ">
                                                    <strong>
                                                 @{{ item.user.name }}
                                                    </strong></label>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                </div>
            </div>
        </div>

    </notes-show>

@endsection
