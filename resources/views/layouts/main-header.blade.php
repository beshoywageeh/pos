<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                @if (Lang::locale() == 'en')
                    <img class="img-size-50 img-circle mr-3" src="{{ URL::asset('assets/img/flags/us_flag.jpg') }}"
                        alt="English">
                @else
                    <img class="img-size-50 img-circle mr-3" src="{{ URL::asset('assets/img/flags/eg_flag.jpg') }}"
                        alt="العربية">
                @endif
                <i class="fas fa-caret-down mx-1"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a class="" rel="alternate" hreflang="{{ $localeCode }}"
                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                            class="dropdown-item">
                            @if ($properties['native'] == 'English')
                                <img class="img-size-50 img-circle mr-3" src="{{ URL::asset('assets/img/flags/us_flag.jpg') }}"
                                    alt="English">
                            @else
                                <img class="img-size-50 img-circle mr-3" src="{{ URL::asset('assets/img/flags/eg_flag.jpg') }}"
                                    alt="العربية">
                            @endif
                        </a>
                    @endforeach
                    <!-- Message End -->
                </a>

            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-users"></i>
                <i class="fas fa-caret-down"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a class="dropdown-item" href=""><i
                        class="fas fa-user"></i>{{ trans('main-header.Profile') }}</a>
                <a class="dropdown-item" href=""><i class="bx bx-slider-alt"></i>
                    {{ trans('main-header.Account Settings') }}</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                    <i class="bx bx-log-out"></i> {{ trans('main-header.Sign Out') }}
                </a>
                <form id="frm-logout" action="{{ \LaravelLocalization::localizeURL('/logout') }}" method="POST"
                    style="display: none;">
                    @csrf
                </form>
            </div>
        </li>

    </ul>
</nav>
