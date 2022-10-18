@extends('layout.app')

@section('content')
    <posters-index inline-template >
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-right mb-4">
                        <a  href="{{url('posters/create')}}" class="btn btn-warning text-white"> <i class="fa fa-plus mr-2"></i> اضافة</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group m-form__group row">
                                <div class="col-lg-3">
                                    <input  type="text" placeholder="رقم اللوحة" v-model="poster_no" class="form-control m-input" :filterable="true">
                                </div>


{{--                                <div class="col-lg-3">--}}
{{--                                    <input  type="text" placeholder=" المدينة" v-model="city" class="form-control m-input" :filterable="true">--}}
{{--                                </div>--}}

{{--                                <div class="col-lg-3">--}}
{{--                                    <input  type="text" placeholder=" الحي" v-model=neighborhood class="form-control m-input" :filterable="true">--}}
{{--                                </div>--}}

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
                                <table-column  label="الصورة">
                                    <template slot-scope="item">
                                        <img v-if="item.image" :src="'/storage/uploads/300/'+item.image" class="pic-1" width="80px;" height="80px;">
                                    </template>
                                </table-column>
                                <table-column show="poster_no" label="رقم اللوحة">

                                </table-column>
                                <table-column  label="تاريخ الاضافة">
                                    <template slot-scope="item">
                                        @{{ getDateFormat(item.created_at) }}

                                    </template>
                                </table-column>
                                <table-column show="size" label=" المقاس "></table-column>


                                <table-column label="التفاصيل" :sortable="false" :filterable="false">
                                    <template slot-scope="item">


{{--                                        <a :href="`/posters/${item.id}/edit`"  class="btn btn-light px-2 border">--}}
{{--                                           تعديل--}}
{{--                                        </a>--}}

                                        <a :href="`{{asset('')}}posters/${item.id}/show`"  class="btn btn-light px-2 border">
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
    </posters-index>

@endsection
