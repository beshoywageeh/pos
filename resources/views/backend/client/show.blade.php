@extends('layouts.master') @section('title') {{trans('client.title')}} @endsection 
@section('css') 
<style>
    *{
        text-transform: capitalize;
    }
    .text_data{
    font-size:1rem;
}
.report-header{
    display:none !important;
}

@media print{
    *{
        margin:0 !important;
        padding:0 !important;border:0 !important;}
#head,.main-header-right,.main-header-left,.no,.print,.main-footer,.bal{display: none !important}
.client_data{
    margin:2rem !important;
}
.report-header{
    display:flex !important;
justify-content:space-between !important;
align-items:center !important;
margin-top:0.9rem !important;
}
.total{
    text-align: center;
    margin-top: 2rem !important;
    color:#0162e8;
}
.card{
    margin-right: 2rem !important;
    margin-left: 2rem !important;
}
.text_data{display:flex !important}
}
.data{font-size:1rem;}
</style>
@endsection
<!-- Content Header (Page header) -->
@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between no">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('client.title')}}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('client.main')}}</span>
            </div>
   
        </div>
    </div>
    @include('backend.msg')

    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class='report-header row my-4'>
                    <div class="report-date col-sm-3 py-2">
                        <span>تاريخ الطباعه : {{now()->format('Y-m-d')}}</span>
                    </div>
                    <div class="report-name col-sm-6 py-2 bg-secondary-gradient">
                        <h4 class="report-head text-center text-white text-bold">تقرير ارصدة عملاء</h4>
                    </div>
                    <div class="report-user col-sm-3 py-2 text-center text-bold">
                        <span>{{Auth::user()->name}}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-8">
                        <h4 class="card-title bal">{{trans('client.balance')}}</h4>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="d-flex right-content">
                            <div class="pr-1 mb-3 mb-xl-0">
                                <button class="btn btn-danger float-left mr-2 print">
                                    <i class="mdi mdi-printer ml-1"></i>{{trans('general.print')}}
                                </button>
                            </div>
                        </div>
                    </div> 
                </div>
                <hr>
                <div class="client_data">
                    <div class="row mb-2">
                        <div class="col-sm-12 col-md-6">
                            <h1 class='text_data'>{{trans('client.name')}} : {{$client->name}}</h1>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <h1 class='text_data'>{{trans('client.phone')}} : {{$client->phone}}</h1>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-12 col-md-12">
                            <h1 class='text_data'>{{trans('client.address')}} : {{$client->address}}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-md-nowrap text-center tx-15 tx-bold">
                        <thead>
                        <tr>
                            <th class="wd-2">#</th>
                            <th><span class='data'>{{trans('sales.inv_num')}}</span></th>
                            <th><span class='data'>{{trans('sales.total')}}</span></th>
                            <th><span class='data'>{{trans('sales.client')}}</span></th>
                            <th><span class='data'>{{trans('sales.date')}}</span></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($sales as $sale)
                            <tr role="row">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$sale->inv_num}}</td>
                                <td>{{$sale->formatcurrncy()}} {{env('MAIN_CURRENCY')}}</td>
                                <td>{{$sale->user->name}}</td>
                                <td>{{$sale->formatdate()}}</td>
                                                           </tr>
                             @empty
                            <tr>
                                <td class="text-center" colspan="4">{{trans('client.msg')}}</td>
                            </tr>

                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class='card-footer'>
                <h5 class='total'>{{trans('client.report_msg')}} : <em>{{$client->totalBalance()}}</em> {{env('MAIN_CURRENCY')}}</h5>
               
                    
            </div>
        </div>

    </div>

@endsection 
@section('js') 
<script>
    let button = document.querySelector('.print');
    button.addEventListener('click', function(e) {
        e.preventDefault();
        window.print();
    })
</script>

 @endsection
