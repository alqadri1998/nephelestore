<?php

/* Sidebar Items Config File */

return [

	/********** Products and [ colors & sizes] Attributes*******************/
	[
		'title' => 'products_and_attributes',
		'permission' => ['list-products', 'list-product-colors', 'list-product-sizes'],
		'route' => ['admin.product_colors.index', 'admin.products.index', 'admin.product_sizes.index'],
		'icon' => 'menu-icon flaticon2-gift-1',
		'type' => 'multiple',
		'childs' => [
			[
				'title' => 'products.index',
				'permission' => 'list-products',
				'route' => 'admin.products.index',
				'icon' => 'menu-icon flaticon2-gift-1',
				'type' => 'single',
				'childs' => [],
			],
			[
				'title' => 'product_colors.index',
				'permission' => 'list-product-colors',
				'route' => 'admin.product_colors.index',
				'icon' => 'menu-icon flaticon2-gift-1',
				'type' => 'single',
				'childs' => [],
			],
			// [
			// 	'title'			=> 'product_sizes.index',
			// 	'permission'		=> 'list-product-sizes',
			// 	'route'			=> 'admin.product_sizes.index',
			// 	'icon'			=> 'menu-icon flaticon2-gift-1',
			// 	'type'			=> 'single',
			// 	'childs'			=> []
			// ],
		],
	],
	/************ orders *****************/
	[
		'title' => 'orders.index',
		'permission' => 'list-orders',
		'route' => 'admin.orders.index',
		'icon' => 'menu-icon flaticon2-gift-1',
		'type' => 'single',
		'childs' => [],
	],

	// /***********Reports******************/
	// [
	// 	'title'			=> 'Reports',
	// 	'permission'	=> ['list-admins'],
	// 	'route'			=> ['admin.reports.salons'],
	// 	'icon'			=> 'menu-icon flaticon-diagram',
	// 	'type'			=> 'multiple',
	// 	'childs'		=> [
	// 		[
	// 			'title'			=> 'reports.salons',
	// 			'permission'	=> 'list-roles',
	// 			'route'			=> 'admin.reports.salons',
	// 			'icon'			=> 'menu-icon flaticon2-gift-1',
	// 			'type'			=> 'single',
	// 			'childs'		=> []
	// 		],

	// 	]
	// ],

	/***********coupons******************/
	[
		'title' => 'coupons.index',
		'permission' => 'list-coupons',
		'route' => 'admin.coupons.index',
		'icon' => 'menu-icon flaticon-squares',
		'type' => 'single',
		'childs' => [],
	],
	// /***********categories******************/
	[
		'title' => 'categories.index',
		'permission' => 'list-categories',
		'route' => 'admin.categories.index',
		'icon' => 'menu-icon flaticon-squares',
		'type' => 'single',
		'childs' => [],
	],
	// /***********users******************/
	[
		'title' => 'users.index',
		'permission' => 'list-users',
		'route' => 'admin.users.index',
		'icon' => 'menu-icon flaticon-users-1',
		'type' => 'single',
		'childs' => [],
	],
	// /***********carts******************/

	[
		'title' => 'carts.index',
		'permission' => 'list-users',
		'route' => 'admin.carts.index',
		'icon' => 'menu-icon flaticon-cart',
		'type' => 'single',
		'childs' => [],
	],
	// /***********Reservations******************/

	// /***********pages******************/
	[
		'title' => 'pages.index',
		'permission' => 'list-pages',
		'route' => 'admin.pages.index',
		'icon' => 'menu-icon flaticon-squares',
		'type' => 'single',
		'childs' => [],
	],

	// /***********reviews******************/
	[
		'title' => 'reviews.index',
		'permission' => 'list-users',
		'route' => 'admin.reviews',
		'icon' => 'menu-icon flaticon-squares',
		'type' => 'single',
		'childs' => [],
	],
	// /***********users******************/
	[
		'title' => 'contacts.index',
		'permission' => 'list-users',
		'route' => 'admin.contacts.index',
		'icon' => 'menu-icon flaticon-users-1',
		'type' => 'single',
		'childs' => [],
	],
	/***********Admin And Roles******************/
	[
		'title' => 'roles_admins',
		'permission' => ['list-roles', 'list-admins'],
		'route' => ['admin.roles.index', 'admin.admins.index'],
		'icon' => 'menu-icon flaticon2-user-1',
		'type' => 'multiple',
		'childs' => [
			[
				'title' => 'roles.index',
				'permission' => 'list-roles',
				'route' => 'admin.roles.index',
				'icon' => 'menu-icon flaticon2-gift-1',
				'type' => 'single',
				'childs' => [],
			],
			[
				'title' => 'admins.index',
				'permission' => 'list-admins',
				'route' => 'admin.admins.index',
				'icon' => 'menu-icon flaticon2-gift-1',
				'type' => 'single',
				'childs' => [],
			],
		],
	],
	/*****************************/
	// [
	// 	'title'			=> 'orders.index',
	// 	'permission'	=> 'list-orders',
	// 	'route'			=> 'admin.orders.index',
	// 	'icon'			=> 'menu-icon flaticon2-gift-1',
	// 	'type'			=> 'single',
	// 	'childs'		=> []
	// ],
	/*****************************/
	[
		'title' => 'subscriptions',
		'permission' => 'manage-settings',
		'route' => 'admin.subscriptions',
		'icon' => 'menu-icon flaticon-users-1',
		'type' => 'single',
		'childs' => [],
	],
	// /************ sliders *****************/
	[
		'title' => 'sliders.index',
		'permission' => 'list-slider_items',
		'route' => 'admin.sliders.index',
		'icon' => 'menu-icon flaticon-lifebuoy',
		'type' => 'single',
		'childs' => [],
	],
	// /************ Settings *****************/
	[
		'title' => 'Settings',
		'permission' => 'manage-settings',
		'route' => 'admin.settings',
		'icon' => 'menu-icon flaticon2-settings',
		'type' => 'single',
		'childs' => [],
	],
	/*****************************/
	[
		'title' => 'Backup',
		'permission' => 'manage-backup',
		'route' => 'admin.backup.index',
		'icon' => 'menu-icon flaticon2-copy',
		'type' => 'single',
		'childs' => [],
	],
];
