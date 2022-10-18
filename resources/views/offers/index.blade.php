@extends('layout.app')

@section('content')
    <offers-index inline-template >
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-right mb-4">
                        <a  href="{{url('offers/create')}}" class="btn btn-warning text-white"> <i class="fa fa-plus mr-2"></i> اضافة</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-group m-form__group row">
                                <div class="col-lg-3">
                                    <input  type="text" placeholder="رقم الطلب" v-model="offer_no" class="form-control m-input" :filterable="true">
                                </div>

                                <div class="col-lg-3">
                                    <input  type="text" placeholder="المدينة " v-model="city" class="form-control m-input" :filterable="true">
                                </div>

                                <div class="col-lg-3">
                                    <input  type="text" placeholder=" الحي" v-model="neighborhood" class="form-control m-input" :filterable="true">
                                </div>

                                <div class="col-lg-3">
                                 <input  type="text" placeholder=" المساحة " v-model="space" class="form-control m-input" :filterable="true">
                                </div>

                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-3">

                                 <input  type="text" placeholder="السعر" v-model="price" class="form-control m-input" :filterable="true">

                                </div>

                                <div class="col-lg-3">
                                    <el-select v-model="real_estate_type" placeholder="نوع العقار">
                                        <el-option
                                            v-for="item in real_estate_type_arr"
                                            :key="item.id"
                                            :label="item.name"
                                            :value="item.id">
                                        </el-option>
                                    </el-select>
                                </div>

                                <div class="col-lg-3">
                                    <el-select v-model="status" placeholder=" الحالة">
                                        <el-option
                                            v-for="item in status_arr"
                                            :key="item.id"
                                            :label="item.name"
                                            :value="item.id">
                                        </el-option>
                                    </el-select>
                                </div>

                                <div class="col-lg-3">
                                    <button class="btn btn-primary" @click="search">فلترة</button>
{{--                                    <button class="btn btn-secondary" @click="cancel">الغاء</button>--}}
                                </div>



                            </div>
                            <table-component
                                :data="fetchData"
                                :show-caption="false"
                                ref="table"
                                :show-filter="false"
                            >
                                <table-column  label="الصورة ">
                                    <template slot-scope="item">
                                        <img v-if="item.instrument_image" :src="'storage/uploads/300/'+item.instrument_image" class="pic-1" width="80px;" height="80px;">
                                    </template>
                                </table-column>

                                <table-column  show="offer_no" label="رقم العرض"></table-column>

                                <table-column  label="تاريخ الاضافة">
                                    <template slot-scope="item">
                                        @{{ getDateFormat(item.created_at) }}

                                    </template>
                                </table-column>
                                <table-column show="client.name" label="مالك العقار "></table-column>

                                <table-column  label=" نوع العقار">
                                    <template slot-scope="item">
                                       <span v-if="item.real_estate_type=='flat'">شقة</span>
                                       <span v-if="item.real_estate_type=='fella'">فلة</span>
                                       <span v-if="item.real_estate_type=='land'">أرض</span>
                                       <span v-if="item.real_estate_type=='rest'">استراحة</span>

                                    </template>
                                </table-column>
                                <table-column show="city" label="المدينة "></table-column>

                                <table-column show="neighborhood" label="الحي "></table-column>

                                <table-column  label="حالة الطلب ">
                                    <template slot-scope="item">
                                        <el-select v-model="item.status" placeholder=" الحالة"   @change="changStatus(item.id,item.status)" v-if="auth_user.name == 'admin'">
                                            <el-option
                                                v-for="item in status_arr"
                                                :key="item.id"
                                                :label="item.name"
                                                :value="item.id"
                                            >
                                            </el-option>
                                        </el-select>
                                        <div v-if="auth_user.name != 'admin'">
                                              <span v-if="item.status=='new'" class="btn btn-primary py-0 border">جديد</span>
                                              <span v-if="item.status=='received'" class="btn btn-success py-0 border">مستلم</span>
                                               <span v-if="item.status=='finished'" class="btn btn-danger py-0 border">منتهي</span>
                                        </div>

                                    </template>
                                </table-column>

                                <table-column label="التفاصيل" :sortable="false" :filterable="false">
                                    <template slot-scope="item">


{{--                                        <a :href="`/posters/${item.id}/edit`"  class="btn btn-light px-2 border">--}}
{{--                                           تعديل--}}
{{--                                        </a>--}}

                                        <a :href="`{{asset('')}}offers/${item.id}/show`"  class="btn btn-light px-2 border">
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
    </offers-index>

@endsection
