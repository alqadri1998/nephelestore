<?php $currentRoute = Route::currentRouteName(); ?>

<ul class="nav nav-tabs list flex-column mb-0" role="tablist">
    <li class="nav-item {{ $currentRoute == 'user.dashboard' ? 'active': '' }}">
        <a class="nav-link" href="{{ route('user.dashboard') }}">{{ t('Account Details','site') }}</a>
    </li>
    <li class="nav-item {{ $currentRoute == 'user.myOrders' ? 'active': '' }}">
        <a class="nav-link" href="{{ route('user.myOrders') }}">{{ t('My Orders','site') }}</a>
    </li>

   {{--  <li class="nav-item">
        <a class="nav-link" href="#">{{ t('My Addresse','site') }}</a>
    </li> --}}

    <li class="nav-item">
        <a class="nav-link" href="{{ route('wishlist') }}">{{ t('Wishlist','site') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}">{{ t('Logout','site') }}</a>
    </li>
</ul>