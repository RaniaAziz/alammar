@extends('layout.app')

@section('content')
    <mediators-show   :item='{!! isset($item) ? $item->toJson() : 'null' !!}' inline-template >
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-right mb-4">
                        <a  :href="`{{asset('')}}mediators/${item.id}/edit`" class="btn btn-primary text-white"> تعديل </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">

                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label">  الوسيط </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="" class="form-text "><strong>@{{ item.client.name }}</strong></label>

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
                                                <label for="" class="form-label"> تخصص الوسيط  </label>
                                            </div>
                                            <div class="col-lg-6">

                                                <label for="" class="form-text ">
                                                    <strong>
                                                        @{{ item.specialty }}
                                                    </strong>
                                                </label>


                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label"> المهنة  </label>
                                            </div>
                                            <div class="col-lg-6">

                                                <label for="" class="form-text ">
                                                    <strong>
                                                        @{{ item.job }}
                                                    </strong>
                                                </label>


                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-4">
                                                <label for="" class="form-label"> جهة العمل  </label>
                                            </div>
                                            <div class="col-lg-6">

                                                <label for="" class="form-text ">
                                                    <strong>
                                                        @{{ item.employer }}
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




                                    </div>
                                </div>
                </div>
            </div>
        </div>

    </mediators-show>

@endsection
