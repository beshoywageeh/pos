@extends('layouts.master')
@section('css')
<link href="{{URL::asset('assets/plugins/morris.js/morris.css')}}" rel="stylesheet">

@endsection
@section('content')
        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="left-content">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">{{ trans('general.welcome') }} {{ $data['name'] }}</h2>
            
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
                                    <h4 class="tx-20 fw-bold mb-1 text-white">{{ $data['category'] }}</h4>
                                    <p class="mb-0 tx-12 text-white op-7">Compared to last week</p>
                                </div>
                                <span class="float-end my-auto ms-auto"> <i class="fas fa-arrow-circle-up text-white"></i> <span class="text-white op-7"> +427</span> </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                <div class="card overflow-hidden sales-card bg-danger-gradient">
                    <div class="px-3 pt-3 pb-2 pt-0">
                        <div class=""><h6 class="mb-3 tx-12 text-white">{{trans('general.tsales')}}</h6></div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div class="">
                                    <h4 class="tx-20 fw-bold mb-1 text-white">{{$data['clients']}}</h4>
                                    <p class="mb-0 tx-12 text-white op-7">Compared to last week</p>
                                </div>
                                <span class="float-end my-auto ms-auto"> <i class="fas fa-arrow-circle-down text-white"></i> <span class="text-white op-7"> -23.09%</span> </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                <div class="card overflow-hidden sales-card bg-success-gradient">
                    <div class="px-3 pt-3 pb-2 pt-0">
                        <div class=""><h6 class="mb-3 tx-12 text-white">TOTAL EARNINGS</h6></div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div class="">
                                    <h4 class="tx-20 fw-bold mb-1 text-white">{{$data['total_sales']}} {{env('MAIN_CURRENCY')}}</h4>
                                    <p class="mb-0 tx-12 text-white op-7">Compared to yestarday &nbsp; <br>
                                        <p class="mb-0 text-white">{{$data['yesterday']}} {{env('MAIN_CURRENCY')}}</p></p>
                                   
                                </div>
                                <span class="float-end my-auto ms-auto"> <i class="fas fa-arrow-circle-down text-white"></i> <span class="text-white op-7"> -23.09%</span> </span>
                            </div>
                        </div>
                    </div>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-sm">
            <div class="col-md-12">
                <div class="card mg-b-20">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            {{ trans('general.sales') }}
                        </div>
                        <div class="morris-wrapper-demo" id="morrisLine2"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-sm">
            <div class="col-md-6">
                        <div class="card mg-b-20" id="tabs-style2">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									{{ trans('general.lastten') }}
								</div>
								<div class="text-wrap">
									<div class="example">
										<div class="panel panel-primary tabs-style-2">
											<div class=" tab-menu-heading">
												<div class="tabs-menu1">
													<!-- Tabs -->
													<ul class="nav panel-tabs main-nav-line">
														<li><a href="#tab4" class="nav-link active" data-toggle="tab"> {{ trans('client.title') }}</a></li>
														<li><a href="#tab5" class="nav-link" data-toggle="tab">{{ trans('invoice.invoice') }}</a></li>
														<li><a href="#tab6" class="nav-link" data-toggle="tab">Tab 03</a></li>
													</ul>
												</div>
											</div>
											<div class="panel-body tabs-menu-body main-content-body-right border">
												<div class="tab-content">
													<div class="tab-pane active" id="tab4">
<div class="table">
    <table class="table report-table text-md-nowrap table-bordered text-center" >
        <thead class='alert-success'>
        <tr>
            <th>{{ trans('client.code') }}</th>
            <th>{{ trans('client.name') }}</th>
            <th>{{ trans('client.phone') }}</th>
        
        </tr>
        </thead>
    <tbody>
        @forelse ($data['clientlast'] as $client) 
        <tr>
            <td>{{ $client->id }}</td>
            <td>{{ $client->name }}</td>
            <td>{{ $client->phone }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="3">{{ trans('clien.msg') }}</tr>
        </tr>
    @endforelse
    </tbody>
    </table>
</div>
													</div>
													<div class="tab-pane" id="tab5">
                                                        <div class="table">
                                                            <table class="table-reponsive report-table text-md-nowrap table-bordered text-center" >
                                                                <thead class='alert-success'>
                                                                <tr>
                                                                    <th>{{ trans('sales.inv_num') }}</th>
                                                                    <th>{{ trans('client.name') }}</th>
                                                                    <th>{{ trans('sales.date') }}</th>
                                                                    <th>{{ trans('sales.total') }}</th>
                                                                
                                                                </tr>
                                                                </thead>
                                                            <tbody>
                                                                @forelse ($data['saleslast'] as $sale) 
                                                                <tr>
                                                                    <td>{{ $sale->inv_num }}</td>
                                                                    <td>{{ $sale->client->name }}</td>
                                                                    <td>{{ $sale->inv_date }}</td>
                                                                    <td>{{ $sale->total }}</td>
                                                                </tr>
                                                                @empty
                                                                <tr>
                                                                    <td colspan="3">{{ trans('clien.msg') }}</tr>
                                                                </tr>
                                                            @endforelse
                                                            </tbody>
                                                            </table>
                                                        </div>
													</div>
													<div class="tab-pane" id="tab6">
														<p>praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident,</p>
														<p class="mb-0">similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>
													</div>
												</div>
											</div>
										</div>
									</div>
                    </div>
                </div>
            </div><!-- col-6 -->
        <!-- row closed -->



@endsection
@section('js')
<!--Internal  Morris js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal  Morris js -->
<script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/morris.js/morris.min.js')}}"></script>
<!--Internal Chart Morris js -->
<script src="{{URL::asset('assets/js/chart.morris.js')}}"></script>
<script>
var line = new Morris.Line({
    element: 'morrisLine2',
    resize:'true',
    data:[
        @foreach ($data['sales'] as $sale )
        {
            ym:"{{ $sale->year }}-{{ $sale->month }}",sum:"{{ $sale->Total }}"
        },
            
        @endforeach
    ],
    xkey:'ym',
    ykeys:['sum'],
    labels:['{{ trans("sales.total") }}'],
    lineColors: ['#285cf7'],
    lineWidth: 1,
		ymax: 'auto 100',
		gridTextSize: 11,
		hideHover: 'auto',
		resize: true
});

</script>
@endsection
