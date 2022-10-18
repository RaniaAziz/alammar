@extends('layout.app')

@section('content')
    <notes-index inline-template >
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-right mb-4">
                        <a  href="{{url('notes/create')}}" class="btn btn-warning text-white"> <i class="fa fa-plus mr-2"></i> اضافة</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <table-component
                                :data="fetchData"
                                :show-caption="false"
                                ref="table"
                                :show-filter="false"
                            >

                                <table-column  label="تاريخ الاضافة">
                                    <template slot-scope="item">
                                        @{{ getDateFormat(item.created_at) }}

                                    </template>
                                </table-column>
                                <table-column  label="رقم الطلب ">
                                    <template slot-scope="item">
                                        @{{ item.order.order_no }}

                                    </template>
                                </table-column>


                                <table-column label="التفاصيل" :sortable="false" :filterable="false">
                                    <template slot-scope="item">


{{--                                        <a :href="`/posters/${item.id}/edit`"  class="btn btn-light px-2 border">--}}
{{--                                           تعديل--}}
{{--                                        </a>--}}

                                        <a :href="`{{asset('')}}notes/${item.id}/show`"  class="btn btn-light px-2 border">
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
    </notes-index>

@endsection
