<nav class="sidebar noprint sidebar-offcanvas  bg-light dynamic-active-class-disabled"
    id="sidebar">
    <ul class="nav bg-light">

        <li class="nav-item {{ active_class(['/']) }}">
            <a class="nav-link"
                href="{{ url('/') }}">
                <i class="menu-icon mdi mdi-television"></i>
                <span class="menu-title">{{ __('lang.dashboard') }}</span>
            </a>
        </li>


        <li class="nav-item {{ active_class(['/items']) }}">
            <a class="nav-link"
                href="{{ url('/items') }}">
                <i class="menu-icon mdi mdi-format-list-numbered"></i>
                <span class="menu-title">{{ __('lang.items') }}</span>
            </a>
        </li>
        <li class="nav-item {{ active_class(['proforma']) }}">
            <a class="nav-link"
                href="{{ url('/proforma/list') }}">
                <i class="menu-icon mdi mdi-newspaper"></i>
                <span class="menu-title">{{ __('lang.proforma') }}</span>
            </a>
        </li>
        {{-- <li class="nav-item {{ active_class(['/providers/']) }}">
            <a class="nav-link"
                href="{{ url('/providers/') }}">
                <i class="menu-icon mdi mdi-account-multiple"></i>
                <span class="menu-title">{{ __('lang.providers') }}</span>
            </a>
        </li> --}}
        <li class="nav-item {{ active_class(['client/list']) }}">
            <a class="nav-link"
                href="{{ url('/client/list') }}">
                <i class="menu-icon mdi mdi-human-male-female"></i>
                <span class="menu-title">{{ __('lang.client') }}</span>
            </a>
        </li>
        <li class="nav-item {{ active_class(['/credit']) }}">
            <a class="nav-link"
                href="{{ url('/credit') }}">
                <i class="menu-icon mdi mdi-credit-card"></i>
                <span class="menu-title">{{ __('lang.credit') }}</span>
            </a>
        </li>
        <li class="nav-item {{ active_class(['inventories']) }}">
            <a class="nav-link"
                href="{{ url('/inventories') }}">
                <i class="menu-icon mdi mdi-playlist-plus"></i>
                <span class="menu-title">{{ __('lang.inventories') }} </span>
            </a>
        </li>

        <li class="nav-item {{ active_class(['sales']) }}">
            <a class="nav-link"
                href="{{ url('/sales') }}">
                <i class="menu-icon mdi mdi-playlist-plus"></i>
                <span class="menu-title">{{ __('lang.sales') }} </span>
            </a>
        </li>
        <li class="nav-item {{ active_class(['expense']) }}">
            <a class="nav-link"
                href="{{ url('/expense') }}">
                <i class="menu-icon mdi mdi-playlist-plus"></i>
                <span class="menu-title">{{ __('lang.expenses') }} </span>
            </a>
        </li>

        {{-- <li class="nav-item {{ active_class(['icons/material']) }}">
            <a class="nav-link"
                href="{{ url('/icons/material') }}">
                <i class="menu-icon mdi mdi-emoticon"></i>
                <span class="menu-title">Icons</span>
            </a>
        </li> --}}


        <li class="nav-item {{ active_class(['settings/*']) }}">
            <a class="nav-link"
                data-toggle="collapse"
                href="#settings"
                aria-expanded="{{ is_active_route(['settings/*']) }}"
                aria-controls="settings">
                <i class="menu-icon mdi mdi-settings-box"></i>
                <span class="menu-title">{{ __('lang.settings') }}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ show_class(['settings/*']) }}"
                id="settings">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item {{ active_class(['settings/about']) }}">
                        <a class="nav-link"
                            href="{{ url('/settings/about') }}">Company info</a>
                    </li>
                    <li class="nav-item {{ active_class(['settings/categories']) }}">
                        <a class="nav-link"
                            href="{{ url('/settings/categories') }}">categories</a>
                    </li>
                    <li class="nav-item {{ active_class(['basic-ui/typography']) }}">
                        <a class="nav-link"
                            href="{{ url('/basic-ui/typography') }}">Typography</a>
                    </li>
                    <li class="nav-item {{ active_class(['lookuptype/list']) }}">
                        <a class="nav-link"
                            href="{{ url('/lookuptype/list') }}">lookup type</a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link"
                href="https://www.bootstrapdash.com/demo/star-laravel-free/documentation/documentation.html"
                target="_blank">
                <i class="menu-icon mdi mdi-file-outline"></i>
                <span class="menu-title">Documentation</span>
            </a>
        </li> --}}
    </ul>
</nav>
