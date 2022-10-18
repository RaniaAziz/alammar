@extends('layout.app')

@section('content')
    <clients-show   :item='{!! isset($item) ? $item->toJson() : 'null' !!}' inline-template >
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-right mb-4">
                        <a  :href="`{{asset('')}}clients/${item.id}/edit`" class="btn btn-primary text-white"> تعديل العميل</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                       <div class="card">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label">اسم العميل</label>
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
                                                <label for="" class="form-label"> رقم جوال2</label>
                                            </div>
                                            <div class="col-lg-6">

                                                <label for="" class="form-text "><strong>@{{ item.tel }}</strong></label>


                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label"> رقم الهوية</label>
                                            </div>
                                            <div class="col-lg-6">

                                                <label for="" class="form-text "><strong>@{{ item.ID_no }}</strong></label>


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
                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label">اسم الشركة </label>
                                            </div>
                                            <div class="col-lg-6">

                                                <label for="" class="form-text "><strong>@{{ item.company_name }}</strong></label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label"> المهنة</label>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="" class="form-text "><strong>@{{ item.job }}</strong></label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label">تفاصيل أخرى </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="" class="form-text "><strong>@{{ item.details }}</strong></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-12">
                    <nav class="nav nav-tabs tab">
                        <a class="nav-link active" href="#orders" data-toggle="tab">الطلبات</a>
                        <a class="nav-link " href="#offers" data-toggle="tab">العروض</a>
                    </nav>

                    <div class="tab-content">
                    <div class="tab-pane fade show active" id="orders">
                        <div class="card">
                            <div class="card-body">
                                <table-component
                                    :data="fetchOrdersData"
                                    :show-caption="false"
                                    ref="table"
                                    :show-filter="false"
                                >
                                    <table-column show="order_no"  label="">

                                    </table-column>
                                    <table-column  label="">
                                        <template slot-scope="item">
                                            @{{ getDateFormat(item.created_at) }}

                                        </template>
                                    </table-column>
                                    <table-column show="client.name" label="" ></table-column>

                                    <table-column label="">
                                        <template slot-scope="item">
                                            <span v-if="item.real_estate_type=='flat'">شقة</span>
                                            <span v-if="item.real_estate_type=='fella'">فلة</span>
                                            <span v-if="item.real_estate_type=='land'">أرض</span>
                                            <span v-if="item.real_estate_type=='rest'">استراحة</span>

                                        </template>
                                    </table-column>
                                    <table-column show="city" label=""></table-column>

                                    <table-column show="neighborhood" label=""></table-column>

                                    <table-column label="" >
                                        <template slot-scope="item">
                                            <span v-if="item.status=='new'" class="btn btn-primary py-0 border">جديد</span>
                                            <span v-if="item.status=='received'" class="btn btn-primary py-0 border">مستلم</span>
                                            <span v-if="item.status=='finished'" class="btn btn-primary py-0 border">منتهي</span>
                                        </template>
                                    </table-column>

                                    <table-column label="" :sortable="false" :filterable="false">
                                        <template slot-scope="item">
                                            <a :href="`/orders/${item.id}/show`"  class="btn btn-light px-2 border">
                                                تفاصيل
                                            </a>


                                        </template>
                                    </table-column>

                                </table-component>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="offers" >
                        <div class="card">
                            <div class="card-body">
                                <table-component
                                    :data="fetchOffersData"
                                    :show-caption="false"
                                    ref="table"
                                    :show-filter="false"
                                >
                                    <table-column  label=" ">
                                        <template slot-scope="item">
                                            <img v-if="item.instrument_image" :src="'/storage/uploads/300/'+item.instrument_image" class="pic-1" width="80px;" height="80px;">
                                        </template>
                                    </table-column>

                                    <table-column  show="offer_no" label=""></table-column>

                                    <table-column  label="">
                                        <template slot-scope="item">
                                            @{{ getDateFormat(item.created_at) }}

                                        </template>
                                    </table-column>
                                    <table-column show="client.name" label=" "></table-column>

                                    <table-column  label="">
                                        <template slot-scope="item">
                                            <span v-if="item.real_estate_type=='flat'">شقة</span>
                                            <span v-if="item.real_estate_type=='fella'">فلة</span>
                                            <span v-if="item.real_estate_type=='land'">أرض</span>
                                            <span v-if="item.real_estate_type=='rest'">استراحة</span>

                                        </template>
                                    </table-column>
                                    <table-column show="city" label=" "></table-column>

                                    <table-column show="neighborhood" label=" "></table-column>

                                    <table-column  label=" ">
                                        <template slot-scope="item">
                                            <span v-if="item.status=='new'" class="btn btn-primary py-0 border">جديد</span>
                                            <span v-if="item.status=='received'" class="btn btn-primary py-0 border">مستلم</span>
                                            <span v-if="item.status=='finished'" class="btn btn-primary py-0 border">منتهي</span>
                                        </template>
                                    </table-column>

                                    <table-column label="" :sortable="false" :filterable="false">
                                        <template slot-scope="item">

                                            <a :href="`/offers/${item.id}/show`"  class="btn btn-light px-2 border">
                                                تفاصيل
                                            </a>


                                        </template>
                                    </table-column>

                                </table-component>

                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>


        </div>

    </clients-show>

@endsection
