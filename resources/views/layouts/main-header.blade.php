<!-- main-header opened -->
<div class="main-header side-header sticky nav nav-item">
    <div class="container-fluid main-container">
        <div class="main-header-left ">
            <div class="responsive-logo">
                <a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/logo.png')}}"
                                                              class="logo-1" alt="logo"></a>
            </div>
            <div class="app-sidebar__toggle" data-toggle="sidebar">
                <a class="open-toggle" href="#"><i class="header-icon fe fe-align-left"></i></a>
                <a class="close-toggle" href="#"><i class="header-icon fe fe-x"></i></a>
            </div>
        </div>

        <div class="main-header-right">
            <ul class="nav">
                <li class="">
                    <div class="dropdown">
                        <button aria-expanded="false" aria-haspopup="true" class="btn btn-sm btn-default"
                                data-toggle="dropdown" id="dropdownMenuButton"
                                type="button">

                            @if(Lang::locale() == 'en')
                                <img class="img-responsive w-50" src="{{URL::asset('assets/img/flags/us_flag.jpg')}}" alt="English">
                            @else
                                <img class="img-responsive w-50" src="{{URL::asset('assets/img/flags/eg_flag.jpg')}}" alt="العربية">
                            @endif<i class="fas fa-caret-down mx-1"></i>
                        </button>
                        <div class="dropdown-menu">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <a class="d-inline-flex text-center justify-content-center m-1" rel="alternate" hreflang="{{ $localeCode }}"
                                   href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                   class="dropdown-item">
                                    @if($properties['native'] == 'English')
                                        <img class="img-responsive w-75" src="{{URL::asset('assets/img/flags/us_flag.jpg')}}"
                                             alt="English">
                                    @else
                                        <img class="img-responsive w-75" src="{{URL::asset('assets/img/flags/eg_flag.jpg')}}"
                                             alt="العربية">
                                    @endif
                                </a>
                            @endforeach

                        </div>
                    </div>
                </li>
            </ul>
            <div class="nav nav-item  navbar-nav-right ml-auto">
                <div class="nav-item full-screen fullscreen-button">
                    <a class="new nav-link full-screen-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-maximize">
                            <path
                                d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path>
                        </svg>
                    </a>
                </div>
                <div class="dropdown main-profile-menu nav nav-item nav-link">
                    <a class="profile-user d-flex" href=""><img alt="" src="{{URL::asset('assets/img/user.png')}}"></a>
                    <div class="dropdown-menu">
                        <div class="main-header-profile bg-primary p-3">
                            <div class="d-flex wd-100p">
                                <div class="main-img-user"><img alt="" src="{{URL::asset('assets/img/user.png')}}"
                                                                class=""></div>
                                <div class=" my-auto">
                                    <h6>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h6>
                                    <h6>{{Auth::user()->email}}</h6>
                                </div>
                            </div>
                        </div>
                        <a class="dropdown-item" href=""><i
                                class="fas fa-user"></i>{{trans('main-header.Profile')}}</a>
                        <a class="dropdown-item" href=""><i
                                class="bx bx-slider-alt"></i> {{trans('main-header.Account Settings')}}</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                            <i class="bx bx-log-out"></i> {{trans('main-header.Sign Out')}}
                        </a>
                        <form id="frm-logout" action="{{  \LaravelLocalization::localizeURL('/logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /main-header -->
