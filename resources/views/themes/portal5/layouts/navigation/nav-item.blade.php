<li class="nav-item">
    <a class="nav-link{{ $isActive($navItem) ? ' active' : '' }}" href="{{ $getLink($navItem) }}">
        <span class="nav-icon">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <x-icons.bi-icon :icon="$navItem['icon'] ?? 'folder'"/>
        </span>
        <span class="nav-link-text">
            {{ __($navItem['label'] ?? 'Click') }}
        </span>
    </a><!--//nav-link-->
</li><!--//nav-item-->
