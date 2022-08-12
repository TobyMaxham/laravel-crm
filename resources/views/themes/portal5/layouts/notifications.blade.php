<div class="app-utility-item app-notifications-dropdown dropdown">
    <a class="dropdown-toggle no-toggle-arrow" id="notifications-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" title="{{ __('labels.Notifications') }}">
        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
        <x-icons.bi-icon icon="bell-icon" />
        @if($unreadNotifications->count() > 0)
            <span class="icon-badge">{{ $unreadNotifications->count() }}</span>
        @endif
    </a><!--//dropdown-toggle-->

    <div class="dropdown-menu p-0" aria-labelledby="notifications-dropdown-toggle">
        <div class="dropdown-menu-header p-3">
            <h5 class="dropdown-menu-title mb-0">{{ __('labels.Notifications') }}</h5>
        </div><!--//dropdown-menu-title-->

        <div class="dropdown-menu-content">
            @foreach($unreadNotifications as $notification)
                <div class="item p-3">
                    <div class="row gx-2 justify-content-between align-items-center">
                        <div class="col-auto">

                            {{--<img class="profile-image" src="assets/images/profiles/profile-1.png" alt="">--}}

                            <div class="app-icon-holder {{ rand(0, 1) == 1 ? 'icon-holder-mono' : '' }}">
                                <x-icons.bi-icon icon="receipt" />
                            </div>
                        </div><!--//col-->
                        <div class="col">
                            <div class="info">
                                <div class="desc">
                                    {!! $notification->data['message'] !!}
                                </div>
                                <div class="meta">
                                    {{ $notification->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </div><!--//col-->
                    </div><!--//row-->
                    {{--<a class="link-mask" href="notifications.html"></a>--}}
                </div><!--//item-->
            @endforeach
        </div><!--//dropdown-menu-content-->

        <div class="dropdown-menu-footer p-2 text-center">
            <a href="{{ url('/notifications') }}">{{ __('labels.View all') }}</a>
        </div>

    </div><!--//dropdown-menu-->
</div><!--//app-utility-item-->
