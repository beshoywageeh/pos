<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="{{ url('/' . $page='index') }}"><img
                src="{{URL::asset('assets/img/brand/logo.png')}}" class="main-logo" alt="logo"/></a>
        <a class="desktop-logo logo-dark active" href="{{ url('/' . $page='index') }}"><img
                src="{{URL::asset('assets/img/brand/logo-white.png')}}" class="main-logo dark-theme" alt="logo"/></a>
        <a class="logo-icon mobile-logo icon-light active" href="{{ url('/' . $page='index') }}"><img
                src="{{URL::asset('assets/img/brand/favicon.png')}}" class="logo-icon" alt="logo"/></a>
        <a class="logo-icon mobile-logo icon-dark active" href="{{ url('/' . $page='index') }}"><img
                src="{{URL::asset('assets/img/brand/favicon-white.png')}}" class="logo-icon dark-theme" alt="logo"/></a>
    </div>
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class=""><img alt="user-img" class="avatar avatar-xl brround"
                                   src="{{URL::asset('assets/img/user.png')}}"/></div>
                <div class="user-info">
                    <h4 class="font-weight-semibold mt-3 mb-0">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h4>
                    <span class="mb-0 text-muted">{{Auth::user()->email}}</span>
                </div>
            </div>
        </div>
        <ul class="side-menu">
            <li class="side-item side-item-category">{{trans('sidebar.index')}}</li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('dashboard') }}">
                    <span class="side-menu__icon"><i class="fas fa-tachometer-alt" style="font-size: 23px"></i></span>
                    <span class="side-menu__label">{{trans('sidebar.index')}}</span>
                </a>
            </li>
            <li class="side-item side-item-category">{{trans('sidebar.Category')}}</li>
            <li class="slide">
                <a class="side-menu__item" href="{{route('category_index')}}">
                    <span class="side-menu__icon"><i class="fas fa-tags" style="font-size: 23px;"></i></span>
                    <span class="side-menu__label">{{trans('sidebar.Category')}}</span>
                </a>
            </li>

            <li class="side-item side-item-category">{{trans('sidebar.product')}}</li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('product_index') }}">
                    <span class="side-menu__icon"><i class="fas fa-store"></i></span>
                    <span class="side-menu__label">{{trans('sidebar.product')}}</span>
                </a>
            </li>
            <li class="side-item side-item-category">{{trans('sidebar.clients')}}</li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('client_index') }}">
                    <span class="side-menu__icon"><i class="fa fa-users"></i></span>
                    <span class="side-menu__label">{{trans('sidebar.clients')}}</span>
                </a>
            </li>
            <li class="side-item side-item-category">{{trans('invoice.invoice')}}</li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <span class="side-menu__icon"><i class="fas fa-shopping-cart"></i></span>
                    <span class="side-menu__label">{{trans('invoice.invoice')}}</span><i
                        class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('salesinvoice_index') }}">{{trans('invoice.salesinvoce')}}</a>
                    </li>
                    <li><a class="slide-item"
                           href="{{ route('salesinvoice_index') }}">{{trans('invoice.rejctsalesinvoice')}}</a></li>
                    <li><a class="slide-item" href="{{ route('salesinvoice_index') }}">{{trans('invoice.supplyinvoce')}}</a>
                    </li>
                    <li><a class="slide-item"
                           href="{{ route('salesinvoice_index') }}">{{trans('invoice.rejctsupplyinvoice')}}</a></li>
                </ul>
            </li>
            <li class="side-item side-item-category">{{trans('sidebar.money_transaction')}}</li>
            <li class="slide">
                <a class="side-menu__item" href="#">
                    <span class="side-menu__icon"><i class="fas fa-chart" style="font-size: 23px;"></i></span>
                    <span class="side-menu__label">{{trans('sidebar.income')}}</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="#">
                    <span class="side-menu__icon"><i class="fe fe-pie-chart" style="font-size: 23px;"></i></span>
                    <span class="side-menu__label">{{trans('sidebar.expenses')}}</span>
                </a>
            </li>
            <li class="side-item side-item-category">{{trans('sidebar.setting')}}</li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('index') }}">
                    <span class="side-menu__icon"><i class="fa fa-cogs"></i></span>
                    <span class="side-menu__label">{{trans('sidebar.setting')}}</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
<!-- main-sidebar -->
