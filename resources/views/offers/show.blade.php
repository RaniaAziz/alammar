@extends('layout.app')

@section('content')
    <offers-show   :item='{!! isset($item) ? $item->toJson() : 'null' !!}'
                   :item_notes='{!! isset($item_notes) ? $item_notes->toJson() : 'null' !!}'

                   inline-template >
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-right mb-4">
                        <a  :href="`{{asset('')}}offers/${item.id}/edit`" class="btn btn-primary text-white"> تعديل </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">

                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label"> صاحب العرض </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="" class="form-text "><strong>@{{ item.client.name }}</strong></label>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label"> نوع العرض</label>
                                            </div>
                                            <div class="col-lg-6">

                                                <label for="" class="form-text ">
                                                    <strong>
                                                        <span v-if="item.order_type=='rent'">ايجار</span>
                                                        <span v-if="item.order_type=='real_estate'">عقار</span>
                                                    </strong></label>


                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label">   نوع العقار</label>
                                            </div>
                                            <div class="col-lg-6">

                                                <label for="" class="form-text "><strong>
                                                        <span v-if="item.real_estate_type=='flat'">شقة</span>
                                                        <span v-if="item.real_estate_type=='fella'">فلة</span>
                                                        <span v-if="item.real_estate_type=='land'">أرض</span>
                                                        <span v-if="item.real_estate_type=='rest'">استراحة</span>
                                                    </strong></label>


                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label"> المدينة  </label>
                                            </div>
                                            <div class="col-lg-6">

                                                <label for="" class="form-text ">
                                                    <strong>
                                                        @{{ item.city }}
                                                    </strong>
                                                </label>


                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label"> الحي  </label>
                                            </div>
                                            <div class="col-lg-6">

                                                <label for="" class="form-text ">
                                                    <strong>
                                                        @{{ item.neighborhood }}
                                                    </strong>
                                                </label>


                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label"> المساحة </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="" class="form-text ">
                                                    <strong>
                                                        @{{ item.space }}
                                                    </strong>
                                                </label>

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label"> السعر </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="" class="form-text ">
                                                    <strong>
                                                        @{{ item.price }}
                                                    </strong>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label"> رقم المخطط </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="" class="form-text ">
                                                    <strong>
                                                        @{{ item.no_planned }}
                                                    </strong>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label"> رقم القطعة </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="" class="form-text ">
                                                    <strong>
                                                        @{{ item.no_piece }}
                                                    </strong>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label">  السوم </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="" class="form-text ">
                                                    <strong>
                                                        @{{ item.soum }}
                                                    </strong>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label">  الحد </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="" class="form-text ">
                                                    <strong>
                                                        @{{ item.limit }}
                                                    </strong>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label">  اللوحة </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="" class="form-text ">
                                                    <strong>
                                                        @{{ item.poster.poster_no }}
                                                    </strong>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label"> تفاصيل أخرى  </label>
                                            </div>
                                            <div class="col-lg-6">

                                                <label for="" class="form-text ">
                                                    <strong>
                                                        @{{ item.details }}
                                                    </strong>
                                                </label>


                                            </div>
                                        </div>

                                        <div class="form-group row" v-if="item_notes.length  != 0">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label">  الملاحظات  </label>
                                            </div>
                                            <div class="col-lg-6">

                                                <ul style="list-style-type:none">
                                                    <li v-for="item in item_notes">
                                                        <span>@{{ getDateFormat(item.created_at )}}</span>   &nbsp;&nbsp;<span> @{{item.user.name}}</span>

                                                        <br>
                                                        @{{ item.notes }}
                                                        <hr>
                                                    </li>
                                                </ul>



                                            </div>
                                        </div>


                                    </div>
                                </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-lg-2 col-md-4">
                                    <label for="" class="form-label"> الملاحظات </label>
                                </div>
                                <div class="col-lg-6">
                                    <textarea v-model="notes" rows="10" style="resize: none"  class="form-control "  placeholder=" الملاحظات"></textarea>

                                </div>
                            </div>

                            <div class="text-right mt-4">
                                <button  @click.prevent="save"class="btn btn-primary px-5"> حفظ</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </offers-show>

@endsection
