<!-- Header -->
<div class="header">
    <!-- Logo -->
    <div class="header-left">
        <a href="/" class="logo">
            <h3>@lang('main.admin_panel')</h3>
        </a>
    </div>
    <!-- /Logo -->

    <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>
    <!-- Header Menu -->
    <ul class="nav user-menu">
        <li>
            <a href="{{ route('locale', __('main.set_lang')) }}">@lang('main.set_lang')</a>
        </li>
        <li class="nav-item dropdown has-arrow main-drop">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <span>{{ auth()->user()->name }}</span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('logout') }}">@lang('main.logout')</a>
            </div>
        </li>
    </ul>
    <!-- /Header Menu -->
</div>
<!-- /Header -->
