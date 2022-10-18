@extends('layout.app')

@section('content')
    <clients-form   :item='{!! isset($item) ? $item->toJson() : 'null' !!}' inline-template >
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">

                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label">  اسم العميل<span  class="text-danger"> *</span> </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="text" v-model="name" class="form-control" placeholder="اسم العميل" :class="{ 'is-invalid': requestForm.error && requestForm.validations.name }">
                                                <div v-if="requestForm.error && requestForm.validations.name" class="invalid-feedback">@{{ requestForm.validations.name[0] }}</div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label"> رقم الجوال  <span  class="text-danger"> *</span></label>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="text" v-model="mobile" class="form-control" placeholder=" رقم الجوال" :class="{ 'is-invalid': requestForm.error && requestForm.validations.mobile }" >
                                                <div v-if="requestForm.error && requestForm.validations.mobile" class="invalid-feedback">@{{ requestForm.validations.mobile[0] }}</div>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label"> رقم جوال2</label>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="text" v-model="tel" class="form-control" placeholder="رقم جوال 2 " >

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label"> رقم الهوية  <span  class="text-danger"> *</span></label>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="text" v-model="ID_no" class="form-control" placeholder=" رقم الهوية" :class="{ 'is-invalid': requestForm.error && requestForm.validations.ID_no }">
                                                <div v-if="requestForm.error && requestForm.validations.ID_no" class="invalid-feedback">@{{ requestForm.validations.ID_no[0] }}</div>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label"> البريد الالكتروني</label>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="text" v-model="email" class="form-control" placeholder="البريد الالكتروني " >

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label">اسم الشركة </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="text" v-model="company_name" class="form-control" placeholder="اسم الشركة " >

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label"> المهنة</label>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="text" v-model="job" class="form-control" placeholder="المهنة " >

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label">تفاصيل أخرى </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <textarea v-model="details" rows="10" style="resize: none"  class="form-control  textarea-editor"  placeholder="تفاصيل أخرى"></textarea>

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label">مرفق</label>
                                            <div class="col-lg-6">
                                                <el-upload
                                                    class="avatar-uploader"
                                                    action="{{asset('upload')}}"
                                                    :show-file-list="false"
                                                    :on-success="handleAvatarSuccess"
                                                    :headers="headers_crsf"
                                                    :before-upload="()=>{this.avatarLoading=true;}">
                                                    <img v-if="image" :src="'/storage/uploads/300/'+image" class="pic-1" width="200px;" height="200px;">
                                                    <i v-else class="btn btn-light px-2 border">استعراض </i>
{{--                                                    <i v-else class="el-icon-plus avatar-uploader-icon"></i>--}}
                                                </el-upload>
                                                <div v-if="requestForm.error && requestForm.validations.image" class="invalid text-danger">@{{ requestForm.validations.image[0] }}</div>
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

    </clients-form>

@endsection
