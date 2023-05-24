<!-- main-sidebar -->

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a class="brand-link" href="{{ route('dashboard') }}"><img src="{{ URL::asset('assets/img/AdminLTELogo.png') }}"
            class="brand-image img-circle elevation-3" alt="logo" /> <span
            class="brand-text font-weight-light">AdminLTE 3</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="img">
                <img alt="user-img" class="img-circle elevation-2"
                    src="{{ URL::asset('assets/img/user2-160x160.jpg') }}" />
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->first_name }}
                    {{ Auth::user()->last_name }}</a>
            </div>
        </div>
        <nav class='mt-2'>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">

                    <a class="nav-link {{ request()->is('ar/') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>{{ trans('sidebar.index') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('Category/index*') || request()->is('ar/Category*') ? 'active' : '' }}"
                        href="{{ route('category_index') }}">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>{{ trans('sidebar.Category') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('product/index*') || request()->is('ar/product*') ? 'active' : '' }}" href="{{ route('product_index') }}">
                        <i class="nav-icon fas fa-store"></i>
                        <p>{{ trans('sidebar.product') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('client_index') }}">
                        <i class="nav-icon fa fa-users"></i>
                        <p>{{ trans('sidebar.clients') }}</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a class="nav-link" data-toggle="nav-link" href="#">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>{{ trans('invoice.invoice') }}</p><i class="angle fe fe-chevron-down"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li><a class="nav-link"
                                href="{{ route('salesinvoice_index') }}">{{ trans('invoice.salesinvoce') }}</a>
                        </li>
                        <li><a class="nav-link"
                                href="{{ route('salesinvoice_index') }}">{{ trans('invoice.rejctsalesinvoice') }}</a>
                        </li>
                        <li><a class="nav-link"
                                href="{{ route('salesinvoice_index') }}">{{ trans('invoice.supplyinvoce') }}</a>
                        </li>
                        <li><a class="nav-link"
                                href="{{ route('salesinvoice_index') }}">{{ trans('invoice.rejctsupplyinvoice') }}</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('money_treasary_index') }}">
                        <i class="nav-icon fas fa-chart"></i>

                        <p>{{ trans('sidebar.money_transaction') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('index') }}">
                        <i class="nav-icon fa fa-cogs"></i>
                        <p>{{ trans('sidebar.setting') }}</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- main-sidebar -->
