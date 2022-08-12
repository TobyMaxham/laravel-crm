<header class="app-header fixed-top">

    {{-- Header Navigation --}}
    <div class="app-header-inner">
        <div class="container-fluid py-2">
            <div class="app-header-content">
                <div class="row justify-content-between align-items-center">

                    <div class="col-auto">
                        <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img"><title>{{ __('labels.Menu') }}</title><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path></svg>
                        </a>
                    </div><!--//col-->

                    <div class="search-mobile-trigger d-sm-none col">
                        <i class="search-mobile-trigger-icon fas fa-search"></i>
                    </div><!--//col-->

                    @isset($withSearch)
                        <div class="app-search-box col">
                            <form class="app-search-form">
                                <input type="text" placeholder="{{ __('labels.Search...') }}" name="search" class="form-control search-input">
                                <button type="submit" class="btn search-btn btn-primary" value="Search"><i class="fas fa-search"></i></button>
                            </form>
                        </div><!--//app-search-box-->
                    @endisset

                    @include('themes.portal5.layouts.user-utilities')

                </div><!--//row-->
            </div><!--//app-header-content-->
        </div><!--//container-fluid-->
    </div><!--//app-header-inner-->

    {{-- Navigation Menu --}}
    <div id="app-sidepanel" class="app-sidepanel sidepanel-hidden">
        <div id="sidepanel-drop" class="sidepanel-drop"></div>
        <div class="sidepanel-inner d-flex flex-column">
            <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
            <div class="app-branding">
                <a class="app-logo" href="{{ url('/') }}">
                    <img class="logo-icon me-2" src="{{ asset('themes/portal5/assets/images/app-logo.svg') }}" alt="logo">
                    <span class="logo-text">{{ config('app.name') }}</span>
                </a>

            </div><!--//app-branding-->

            <x-layouts.app-main-navigation />

            <x-layouts.app-footer-navigation />

        </div><!--//sidepanel-inner-->
    </div><!--//app-sidepanel-->
</header><!--//app-header-->
