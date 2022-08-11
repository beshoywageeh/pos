@extends('layouts.master') @section('content')
        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="left-content">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Hi, welcome back!</h2>
                    <p class="mg-b-0">Sales monitoring dashboard template.</p>
                </div>
            </div>
        </div>
        <!-- breadcrumb -->
        <!-- row -->
        <div class="row row-sm">
            <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                <div class="card overflow-hidden sales-card bg-primary-gradient">
                    <div class="px-3 pt-3 pb-2 pt-0">
                        <div class=""><h6 class="mb-3 tx-12 text-white">{{trans('category.title')}}</h6></div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div class="">
                                    <h4 class="tx-20 fw-bold mb-1 text-white">{{count(\App\Models\category::all())}}</h4>
                                    <p class="mb-0 tx-12 text-white op-7">Compared to last week</p>
                                </div>
                                <span class="float-end my-auto ms-auto"> <i class="fas fa-arrow-circle-up text-white"></i> <span class="text-white op-7"> +427</span> </span>
                            </div>
                        </div>
                    </div>
                    <span id="compositeline" class="pt-1"><canvas style="display: inline-block; width: 232px; height: 30px; vertical-align: top;" width="232" height="30"></canvas></span>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                <div class="card overflow-hidden sales-card bg-danger-gradient">
                    <div class="px-3 pt-3 pb-2 pt-0">
                        <div class=""><h6 class="mb-3 tx-12 text-white">{{trans('client.title')}}</h6></div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div class="">
                                    <h4 class="tx-20 fw-bold mb-1 text-white">{{count(\App\Models\client::all())}}</h4>
                                    <p class="mb-0 tx-12 text-white op-7">Compared to last week</p>
                                </div>
                                <span class="float-end my-auto ms-auto"> <i class="fas fa-arrow-circle-down text-white"></i> <span class="text-white op-7"> -23.09%</span> </span>
                            </div>
                        </div>
                    </div>
                    <span id="compositeline2" class="pt-1"><canvas style="display: inline-block; width: 232px; height: 30px; vertical-align: top;" width="232" height="30"></canvas></span>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                <div class="card overflow-hidden sales-card bg-success-gradient">
                    <div class="px-3 pt-3 pb-2 pt-0">
                        <div class=""><h6 class="mb-3 tx-12 text-white">TOTAL EARNINGS</h6></div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div class="">
                                    <h4 class="tx-20 fw-bold mb-1 text-white">$7,125.70</h4>
                                    <p class="mb-0 tx-12 text-white op-7">Compared to last week</p>
                                </div>
                                <span class="float-end my-auto ms-auto"> <i class="fas fa-arrow-circle-up text-white"></i> <span class="text-white op-7"> 52.09%</span> </span>
                            </div>
                        </div>
                    </div>
                    <span id="compositeline3" class="pt-1"><canvas style="display: inline-block; width: 232px; height: 30px; vertical-align: top;" width="232" height="30"></canvas></span>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                <div class="card overflow-hidden sales-card bg-warning-gradient">
                    <div class="px-3 pt-3 pb-2 pt-0">
                        <div class=""><h6 class="mb-3 tx-12 text-white">PRODUCT SOLD</h6></div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div class="">
                                    <h4 class="tx-20 fw-bold mb-1 text-white">$4,820.50</h4>
                                    <p class="mb-0 tx-12 text-white op-7">Compared to last week</p>
                                </div>
                                <span class="float-end my-auto ms-auto"> <i class="fas fa-arrow-circle-down text-white"></i> <span class="text-white op-7"> -152.3</span> </span>
                            </div>
                        </div>
                    </div>
                    <span id="compositeline4" class="pt-1"><canvas style="display: inline-block; width: 232px; height: 30px; vertical-align: top;" width="232" height="30"></canvas></span>
                </div>
            </div>
        </div>
        <!-- row closed -->

@endsection
@section('js')

@endsection
