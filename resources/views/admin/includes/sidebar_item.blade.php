<?php
	$currentRoute = Route::currentRouteName();
	preg_match('/\w*.\w*./', $currentRoute, $baseRoute);
?>


@if($type == 'single')
	<li class="menu-item {{ $route == $currentRoute ? 'menu-item-active' : '' }}" aria-haspopup="true">
	    <a href="{{ route($route) }}" class="menu-link">
	        <i class="{{ $icon }}"></i>
	        <span class="menu-text">{{ __('admin.' . $title ) }}</span>
	    </a>
	</li>
@else
	<li class="menu-item menu-item-submenu {{ in_array($currentRoute, $route) || in_array($baseRoute[0].'index', $route) ? 'menu-item-active menu-item-open' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
	    <a href="javascript:;" class="menu-link menu-toggle">
	        <i class="{{ $icon }}"></i>
	        <span class="menu-text">{{ __('admin.' . $title ) }}</span>
	        <i class="menu-arrow"></i>
	    </a>
	    <div class="menu-submenu">
	        <i class="menu-arrow"></i>
	        <ul class="menu-subnav">
	            <li class="menu-item menu-item-parent" aria-haspopup="true">
	                <span class="menu-link">
	                    <span class="menu-text">{{ __('admin.' . $title ) }}</span>
	                </span>
	            </li>
	            @if(isset($childs) && count($childs) > 0)
	            	@foreach($childs as $childItem)
	            		@if(Auth::user()->can($childItem['permission']) || $childItem['permission'] == null)
			            	<li class="menu-item {{ explode('.', $childItem['route'])[1] == explode('.', $currentRoute)[1] ? 'menu-item-active' : '' }}" aria-haspopup="true">
			            	    <a href="{{ route($childItem['route']) }}" class="menu-link">
			            	        <i class="menu-bullet menu-bullet-dot">
			            	            <span></span>
			            	        </i>
			            	        <span class="menu-text">{{ __('admin.' . $childItem['title'] ) }}</span>
			            	    </a>
			            	</li>
		            	@endif
		            @endforeach
	            @endif
	        </ul>
	    </div>
	</li>
@endif
