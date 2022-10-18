@extends('layout.app')

@section('content')
    <posters-form   :item='{!! isset($item) ? $item->toJson() : 'null' !!}' inline-template >
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">

                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label"> رقم اللوحة  <span  class="text-danger"> *</span></label>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="text" v-model="poster_no" class="form-control" placeholder="رقم اللوحة " :class="{ 'is-invalid': requestForm.error && requestForm.validations.poster_no }">
                                                <div v-if="requestForm.error && requestForm.validations.poster_no" class="invalid-feedback">@{{ requestForm.validations.poster_no[0] }}</div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label"> مقاس اللوحة </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <el-select v-model="size" placeholder="Select">
                                                    <el-option
                                                        v-for="item in size_arr"
                                                        :key="item.id"
                                                        :label="item.name"
                                                        :value="item.id">
                                                    </el-option>
                                                </el-select>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label"> نوع اللوحة</label>
                                            </div>
                                            <div class="col-lg-6">
                                                <el-select v-model="type" placeholder="Select">
                                                    <el-option
                                                        v-for="item in type_arr"
                                                        :key="item.id"
                                                        :label="item.name"
                                                        :value="item.id">
                                                    </el-option>
                                                </el-select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label"> حالة اللوحة</label>
                                            </div>
                                            <div class="col-lg-6">
                                                <el-select  v-model="status" placeholder="Select">
                                                    <el-option
                                                        v-for="item in status_arr"
                                                        :key="item.id"
                                                        :label="item.name"
                                                        :value="item.id">
                                                    </el-option>
                                                </el-select>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label">صورة اللوحة</label>
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

    </posters-form>

@endsection
