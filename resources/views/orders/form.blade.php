@extends('layout.app')

@section('content')
    <orders-form   :item='{!! isset($item) ? $item->toJson() : 'null' !!}'
                   :clients='{!! isset($clients) ? $clients->toJson() : 'null' !!}'
                   :users='{!! isset($users) ? $users->toJson() : 'null' !!}'
                   inline-template >
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">

                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div v-if="requestForm.error && requestForm.validations" class="invalid-feedback">@{{ requestForm.validations }}</div>

                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label">   صاحب الطلب  <span  class="text-danger"> *</span></label>
                                            </div>
                                            <div class="col-lg-6">
                                                <el-select v-model="client_id" placeholder="حدد العميل"  :class="{'is-invalid': requestForm.error && requestForm.validations.client_id}" :disabled="(item == null)? disabled: ''">
                                                    <el-option  id="client_select"
                                                        v-for="item in clients"
                                                        :key="item.id"
                                                        :label="item.name"
                                                        :value="item.id">
                                                    </el-option>
                                                    <a  @click.prevent="addClient"  class="text-primary" style="margin-right: 40px;"> <i class="fa fa-plus "></i> إضافة عميل جديد</a>
                                                </el-select>
                                                <div v-if="requestForm.error && requestForm.validations.client_id" class="invalid-feedback">@{{ requestForm.validations.client_id[0] }}</div>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label"> نوع الطلب  <span  class="text-danger"> *</span> </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <el-select v-model="order_type" placeholder="Select" :class="{ 'is-invalid': requestForm.error && requestForm.validations.order_type }">
                                                    <el-option
                                                        v-for="item in order_type_arr"
                                                        :key="item.id"
                                                        :label="item.name"
                                                        :value="item.id">
                                                    </el-option>
                                                </el-select>
                                                <div v-if="requestForm.error && requestForm.validations.order_type" class="invalid-feedback">@{{ requestForm.validations.order_type[0] }}</div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label"> نوع العقار  <span  class="text-danger"> *</span></label>
                                            </div>
                                            <div class="col-lg-6">
                                                <el-select v-model="real_estate_type" placeholder="Select" :class="{ 'is-invalid': requestForm.error && requestForm.validations.real_estate_type }">
                                                    <el-option
                                                        v-for="item in real_estate_type_arr"
                                                        :key="item.id"
                                                        :label="item.name"
                                                        :value="item.id">
                                                    </el-option>
                                                </el-select>
                                                <div v-if="requestForm.error && requestForm.validations.real_estate_type" class="invalid-feedback">@{{ requestForm.validations.real_estate_type[0] }}</div>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label"> المدينة </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="text" v-model="city" class="form-control" placeholder="المدينة" :class="{ 'is-invalid': requestForm.error && requestForm.validations.city }">
                                                <div v-if="requestForm.error && requestForm.validations.city" class="invalid-feedback">@{{ requestForm.validations.city[0] }}</div>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label"> الحي </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="text" v-model="neighborhood" class="form-control" placeholder=" الحي" :class="{ 'is-invalid': requestForm.error && requestForm.validations.neighborhood }">
                                                <div v-if="requestForm.error && requestForm.validations.neighborhood" class="invalid-feedback">@{{ requestForm.validations.neighborhood[0] }}</div>

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label"> المساحة </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group row">
                                                    <div class="col-6">
                                                        <div class="form-group row">
                                                            <div class="col-lg-3 col-md-2">
                                                                <label for="" class="form-text"> من </label>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="number" v-model="space_from" class="form-control"  >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group row">
                                                            <div class="col-lg-3 col-md-2">
                                                                <label for="" class="form-text"> الى </label>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="number" v-model="space_to" class="form-control"  >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label"> السعر </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group row">
                                                    <div class="col-6">
                                                        <div class="form-group row">
                                                            <div class="col-lg-3 col-md-2">
                                                                <label for="" class="form-text"> من </label>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="number" v-model="price_from" class="form-control"  >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group row">
                                                            <div class="col-lg-3 col-md-2">
                                                                <label for="" class="form-text"> الى </label>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="number" v-model="price_to" class="form-control"  >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label"> الموظف المسؤول </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <el-select v-model="user_id" placeholder="اختر الموظف المسؤول" :class="{ 'is-invalid': requestForm.error && requestForm.validations.user_id }">
                                                    <el-option
                                                        v-for="item in users"
                                                        :key="item.id"
                                                        :label="item.name"
                                                        :value="item.id">
                                                    </el-option>
                                                </el-select>
                                                <div v-if="requestForm.error && requestForm.validations.user_id" class="invalid-feedback">@{{ requestForm.validations.user_id[0] }}</div>

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label">تفاصيل أخرى </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <textarea v-model="details" rows="10" style="resize: none"  class="form-control "  placeholder="تفاصيل أخرى"></textarea>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                        <div class="text-right mt-4">
                            <button  @click.prevent="save"class="btn btn-primary px-5"> حفظ</button>
                        </div>

{{--                     ADD CLIENT MODAL--}}

                    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-Lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        <span> إضافة عميل جديد</span>
                                    </h5>
                                    <button type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label for="" class="form-label">اسم العميل</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" v-model="name" class="form-control" placeholder="اسم العميل" :class="{ 'is-invalid': requestForm.error && requestForm.validations.name }">
                                            <div v-if="requestForm.error && requestForm.validations.name" class="invalid-feedback">@{{ requestForm.validations.name[0] }}</div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label for="" class="form-label">رقم الجوال </label>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" v-model="mobile" class="form-control" placeholder=" رقم الجوال" >

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label for="" class="form-label"> رقم جوال2</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" v-model="tel" class="form-control" placeholder="رقم جوال 2 " >

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label for="" class="form-label"> رقم الهوية</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" v-model="ID_no" class="form-control" placeholder=" رقم الهوية" required>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label for="" class="form-label"> البريد الالكتروني</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" v-model="email" class="form-control" placeholder="البريد الالكتروني " >

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label for="" class="form-label">اسم الشركة </label>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" v-model="company_name" class="form-control" placeholder="اسم الشركة " >

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label for="" class="form-label"> المهنة</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" v-model="job" class="form-control" placeholder="المهنة " >

                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button  @click.prevent="saveClient"class="btn btn-primary px-5"> حفظ</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </orders-form>

@endsection
