<nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
    <ul class="app-menu list-unstyled accordion" id="menu-accordion">
        @foreach(config('crm-navigation.main') as $index => $navItem)
            <x-layouts.navigation.nav-item :navItem="$navItem" :index="$index" />
        @endforeach
    </ul><!--//app-menu-->
</nav><!--//app-nav-->
