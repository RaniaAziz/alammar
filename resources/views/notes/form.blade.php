@extends('layout.app')

@section('content')
    <notes-form
        :item='{!! isset($item) ? $item->toJson() : 'null' !!}'
        :orders='{!! isset($orders) ? $orders->toJson() : 'null' !!}'
                  inline-template >
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">

                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label">  الطلب<span  class="text-danger"> *</span></label>
                                            </div>
                                            <div class="col-lg-6">
                                                <el-select v-model="order_id" placeholder="رقم الطلب - العميل" :class="{ 'is-invalid': requestForm.error && requestForm.validations.order_id }">
                                                    <el-option
                                                        v-for="item in orders"
                                                        :key="item.id"
                                                        :label="item.name"
                                                        :value="item.id">
                                                    </el-option>
                                                </el-select>
                                                <div v-if="requestForm.error && requestForm.validations.order_id" class="invalid-feedback">@{{ requestForm.validations.order_id[0] }}</div>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label"> الملاحظات </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <textarea v-model="notes" rows="10" style="resize: none"  class="form-control "  placeholder=" الملاحظات"></textarea>

                                            </div>
                                        </div>



                                    </div>
                                </div>

                        <div class="text-right mt-4">
                            <button  @click.prevent="save"class="btn btn-primary px-5"> حفظ</button>
                        </div>
                </div>
            </div>
        </div>

    </notes-form>

@endsection
