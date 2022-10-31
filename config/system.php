<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Custom System configurations
    |--------------------------------------------------------------------------
    */
    
    'permissions'   => [
        [
            'name'          => 'roles',
            'display_name'  => 'Roles',
            'display_name_ar'  => 'الأدوار',
            'crud'          => true
        ],[
            'name'          => 'categories',
            'display_name'  => 'Categories',
            'display_name_ar'  => 'الأقسام',
            'crud'          => true
        ],
        [
            'name'          => 'products',
            'display_name'  => 'Products',
            'display_name_ar'  => 'المنتجات',
            'crud'          => true
        ],    
        [
            'name'          => 'product-colors',
            'display_name'  => 'Product Colors',
            'display_name_ar'  => 'الوان المنتجات',
            'crud'          => true
        ],  
        [
            'name'          => 'product-sizes',
            'display_name'  => 'Product Sizes',
            'display_name_ar'  => 'احجام المنتجات',
            'crud'          => true
        ],
        [
            'name'          => 'coupons',
            'display_name'  => 'coupons',
            'display_name_ar'  => 'كوبونات الخصم',
            'crud'          => true
        ],
        [
            'name'          => 'orders',
            'display_name'  => 'Orders',
            'display_name_ar'  => 'الطلبات',
            'crud'          => true
        ],
// [
//             'name'          => 'slider_items',
//             'display_name'  => 'Home Slider Items',
//             'display_name_ar'  => 'الصور المتحركه في الموقع',
//             'crud'          => true
//         ],
        [
            'name'          => 'pages',
            'display_name'  => 'pages',
            'display_name_ar'  => 'الصفحات',
            'crud'          => true
        ],
       
        [
            'name'          => 'admins',
            'display_name'  => 'Admin Users',
            'display_name_ar'  => 'المشرفين',
            'crud'          => true
        ],

        [
            'name'          => 'users',
            'display_name'  => 'Users',
            'display_name_ar'  => 'المستخدمون',
            'crud'          => true
        ],
        [
            'name'          => 'slider_items',
            'display_name'  => 'Home Slider Items',
            'display_name_ar'  => 'الصور المتحركه',
            'crud'          => true
        ],
       
        
        [
            'name'          => 'manage-settings',
            'display_name'  => 'Settings',
            'display_name_ar'  => 'الأعدادات',
            'crud'          => false
        ],        
        [
            'name'          => 'manage-backup',
            'display_name'  => 'Manage Backup',
            'display_name_ar'  => 'التحكم فى النسخ الاحتياطية',
            'crud'          => false
        ],
    ],


];