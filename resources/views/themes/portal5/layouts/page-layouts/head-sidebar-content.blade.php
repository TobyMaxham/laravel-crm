@extends('themes.portal5.layouts.app')
@section('content')
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            @yield('module')
        </div><!--//app-content-->

        {{-- This Footer must be included in all pages. See copyright note from creator: --}}
        {{-- This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) --}}
        @include('themes.portal5.layouts.copyright-footer-by-xiaoying-riley')
    </div><!--//app-wrapper-->
@endsection

