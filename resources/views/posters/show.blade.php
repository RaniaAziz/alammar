@extends('layout.app')

@section('content')
    <posters-show   :item='{!! isset($item) ? $item->toJson() : 'null' !!}' inline-template >
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-right mb-4">
                        <a  :href="`{{asset('')}}posters/${item.id}/edit`" class="btn btn-primary text-white"> تعديل اللوحة</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">

                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label">رقم اللوحة </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="" class="form-text "><strong>@{{ item.poster_no }}</strong></label>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label">مقاس اللوحة  </label>
                                            </div>
                                            <div class="col-lg-6">

                                                <label for="" class="form-text ">
                                                    <strong>
                                                        @{{ item.size }}
                                                    </strong>
                                                </label>


                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label"> نوع اللوحة</label>
                                            </div>
                                            <div class="col-lg-6">

                                                <label for="" class="form-text ">
                                                    <strong>
                                                        <span v-if="item.type=='for_rent'">للايجار</span>
                                                        <span v-if="item.type=='for_sale'">للبيع</span>
                                                        <span v-if="item.type=='for_waive'">للتنازل</span>
                                                        <span v-if="item.type=='wanted'">مطلوبة</span>
                                                    </strong></label>


                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label">  حالة اللوحة</label>
                                            </div>
                                            <div class="col-lg-6">

                                                <label for="" class="form-text "><strong>
                                                        <span v-if="item.status=='new'">جديدة</span>
                                                        <span v-if="item.status=='old'">قديمة</span>
                                                        <span v-if="item.status=='missing'">مفقودة</span>
                                                        <span v-if="item.status=='archived'">مؤرشفة</span>
                                                    </strong></label>


                                            </div>
                                        </div>


                                    </div>
                                </div>
                </div>
            </div>
        </div>

    </posters-show>

@endsection
