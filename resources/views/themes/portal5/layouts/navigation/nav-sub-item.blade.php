<li class="nav-item has-submenu">
    <a class="nav-link submenu-toggle{{ $isActive($navItem) ? ' active' : '' }}" href="#"
       data-bs-toggle="collapse" data-bs-target="#submenu-{{ $index }}" aria-expanded="{{ $isActive($navItem) ? 'true' : 'false' }}" aria-controls="submenu-{{ $index }}">
        <span class="nav-icon">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <x-icons.bi-icon :icon="$navItem['icon'] ?? 'folder'"/>
        </span>
        <span class="nav-link-text">
            {{ __($navItem['label'] ?? 'Click') }}
        </span>
        <span class="submenu-arrow">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <x-icons.bi-icon icon="chevron-down"/>
        </span><!--//submenu-arrow-->
    </a><!--//nav-link-->
    <div id="submenu-{{ $index }}" class="collapse submenu submenu-{{ $index }}{{ $isActive($navItem) ? ' show' : '' }}" data-bs-parent="#menu-accordion">
        <ul class="submenu-list list-unstyled">
            @foreach($navItem['submenu'] ?? [] as $subItem)
                <li class="submenu-item">
                    <a class="submenu-link{{ $isActive($subItem) ? ' active' : '' }}" href="{{ $getLink($subItem) }}">
                        {{ __($subItem['label'] ?? 'Click') }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</li><!--//nav-item-->
