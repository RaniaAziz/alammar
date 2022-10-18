@extends('layout.app')

@section('content')
    <users-form   :item='{!! isset($item) ? $item->toJson() : 'null' !!}' inline-template >
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">

                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label">  اسم الموظف  <span  class="text-danger"> *</span></label>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="text" v-model="name" class="form-control" placeholder="اسم الموظف" :class="{ 'is-invalid': requestForm.error && requestForm.validations.name }">
                                                <div v-if="requestForm.error && requestForm.validations.name" class="invalid-feedback">@{{ requestForm.validations.name[0] }}</div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label">  رقم الجوال<span  class="text-danger"> *</span> </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="text" v-model="mobile" class="form-control" placeholder=" رقم الجوال"  :class="{ 'is-invalid': requestForm.error && requestForm.validations.mobile }">
                                                <div v-if="requestForm.error && requestForm.validations.mobile" class="invalid-feedback">@{{ requestForm.validations.mobile[0] }}</div>

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label">  البريد الالكتروني  <span  class="text-danger"> *</span></label>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="text" v-model="email" class="form-control" placeholder="البريد الالكتروني " :class="{ 'is-invalid': requestForm.error && requestForm.validations.email }" >
                                                <div v-if="requestForm.error && requestForm.validations.email" class="invalid-feedback">@{{ requestForm.validations.email[0] }}</div>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label"> كلمة المرور </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="password" v-model="password" class="form-control" placeholder="كلمة المرور  " >

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

    </users-form>

@endsection
