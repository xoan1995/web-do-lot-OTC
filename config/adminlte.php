<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#61-title
    |
    */

    'title' => 'Đăng nhập vào quản trị',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#62-favicon
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#63-logo
    |
    */

    'logo' => 'Hệ thống quản trị',
    'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'AdminLTE',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#64-user-menu
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#65-layout
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#661-authentication-views-classes
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#662-admin-panel-classes
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#67-sidebar
    |
    */

    'sidebar_mini' => true,
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#68-control-sidebar-right-sidebar
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#69-urls
    |
    */

    'use_route_url' => false,

    'dashboard_url' => 'admin/giao-dien',

    'logout_url' => 'logout',

    'login_url' => 'login',

    'register_url' => 'register',

    'password_reset_url' => 'password/reset',

    'password_email_url' => 'password/email',

    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#610-laravel-mix
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#611-menu
    |
    */

    'menu' => [
        [
            'text' => 'blog',
            'url'  => 'admin/blog',
            'can'  => 'manage-blog',
        ],
        [
            'text' =>'TRANG CHỦ',
            'icon' =>'fas fa-tachometer-alt',
            'url' => 'admin/index',
        ],
        [
            'text' =>'DANH MỤC',
            'icon' =>'fas fa-address-book',
            'submenu' =>[
                [
                    'text' => 'Danh sách',
                    'url' => 'admin/danh-muc-cha',
                ],
                [
                    'text' => 'Tạo mới',
                    'url'  => 'admin/danh-muc',
                ],
            ],
        ],
        [
            'text'    => 'SẢN PHẨM',
            'icon'    => 'fas fa-archive',
            'submenu' => [
                [
                    'text' => 'Danh sách',
                    'url'  => 'admin/san-pham',
                ],
                [
                    'text' => 'Tạo mới',
                    'url'  => 'admin/san-pham/create',
                ],
                [
                    'text' => 'Nhãn hiệu',
                    'url'  => 'admin/logo',
                ],
                [
                    'text' =>'Style',
                    'submenu'=>[
                        [
                            'text'=>'Thuộc tính',
                            'url' => 'admin/tuy-chinh',
                        ],
                        [
                            'text'=>'Kiểu dáng',
                            'url' => 'admin/kieu-dang',
                        ],
                    ],
                ],

            ],
        ],
        [
            'text' =>'CHIẾT KHẤU',

            'icon' =>'fas fa-users',
            'submenu' =>[
                    [
                        'text' =>'Bảng chiết khấu',
                        'url' => 'admin/seller/danh-sach',
                    ],
                    [
                        'text' =>'Điều chỉnh chiết khấu',
                        'url' => 'admin/seller/create',
                    ],
                ]
        ],
        [
            'text'    => 'BÀI VIẾT',
            'icon'    => 'far fa-file',
            'submenu' => [
                [
                    'text' => 'Danh sách',
                    'url'  => 'admin/bai-viet',
                ],
                [
                    'text' => 'Tạo mới',
                    'url'  => 'admin/bai-viet/create',
                ],
            ],
        ],
        [
            'text' =>'KHÁCH HÀNG',
            'icon' => 'fab fa-wpforms',
            'submenu' =>[
                // [
                //     'text' =>'Liên hệ ',
                //     'url' => 'admin/lien-he',
                // ],
                [
                    'text' =>'Đặt hàng',
                    'url' => 'admin/lien-he/orders',
                ],
            ]
        ],
        [
            'text' =>'THƯ VIỆN',
            'icon' => 'far fa-images',
            'url' =>'admin/thu-vien/gallery',
        ],
        [
            'text' =>'GIAO DIỆN',

            'icon' =>'fas fa-align-justify',
            'submenu' =>[
                    [
                        'text' =>'Giao diện chung',
                        'url' => 'admin/giao-dien',
                    ],
                    [
                        'text' =>'Banner',
                        'url' => 'admin/banner',
                    ],
                    [
                        'text' =>'Đối tác',
                        'url' => 'admin/partner',
                    ],
                    [
                        'text' =>'Mạng xã hội',
                        'url' => 'admin/social',
                    ],
                    [
                        'text' => 'Bản đồ-vị trí',
                        'url' => 'admin/maps'
                    ],
                    [
                        'text' =>'Footer',
                        'submenu'=>[
                            [
                                'text'=>'Danh sách',
                                'url' => 'admin/footer',
                            ],
                            [
                                'text'=>'Tạo',
                                'url'=>'admin/footer/create'
                            ]
                        ],
                    ],
                ]
        ],
        [
            'text' =>'MỞ RỘNG',

            'icon' =>'fas fa-book-open',
            'submenu' =>[
                    [
                        'text' =>'Gắn code',
                        'url' => 'admin/code',
                    ],
                    [
                        'text' =>'SEO',
                        'url' => '#',
                    ],
                ]
        ],
        [
            'text' =>'NGƯỜI DÙNG',

            'icon' =>'fas fa-users',
            'submenu' =>[
                    [
                        'text' =>'Tạo user',
                        'url' => 'admin/nguoi-dung/tao-nguoi-dung',
                    ],
                    [
                        'text' =>'Users quản trị',
                        'url' => 'admin/nguoi-dung/danh-sach',
                    ],
                ]
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#612-menu-filters
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#613-plugins
    |
    */

    'plugins' => [
        [
            'name' => 'Datatables',
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        [
            'name' => 'Select2',
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        [
            'name' => 'Chartjs',
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        [
            'name' => 'Sweetalert2',
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        [
            'name' => 'Pace',
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
        [
            'name' => 'Jquery',
            'active' => false,
            'files' =>[
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' =>'js/jquery-3.5.1.min.js',
                ],
            ],
        ],
        [
            'name' =>'Dualist box',
            'active' => true,
            'files' =>[
                [
                    'type' => 'js',
                    'asset'=>true,
                    'location'=>'vendor/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js'
                ],
                [
                    'type' =>'css',
                    'asset'=>true,
                    'location'=>'vendor/bootstrap4-duallistbox/bootstrap-duallistbox.min.css'
                ]
            ]
        ],
        [
            'name' =>'Drag and drop',
            'active'=>false,
            'files' =>[
                [
                    'type' =>'js',
                    'asset'=>false,
                    'location'=>'//code.jquery.com/ui/1.11.4/jquery-ui.min.js'
                ],
                [
                    'type' =>'css',
                    'asset'=>false,
                    'location'=>'//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css'
                ],
            ]
        ],
        [
            'name' => 'Summer Note',
            'active' => true,
            'files' =>[
                [
                    'type' => 'css',
                    'asset' =>true,
                    'location' =>'vendor/summernote/summernote.css'
                ],
                [
                    'type' => 'js',
                    'asset' =>true,
                    'location' =>'vendor/summernote/summernote.js'
                ]
            ]
        ],
        [
            'name' => 'Standalone button',
            'active' => true,
            'files' =>[
                [
                    'type' =>'js',
                    'asset' => true,
                    'location' =>'vendor/laravel-filemanager/js/stand-alone-button.js'
                ]
            ]
        ],
        [
            'name' => 'File input',
            'active' => true,
            'files' =>[
                [
                    'type' => 'js',
                    'asset'=>true,
                    'location' => 'vendor/bs-custom-file-input/bs-custom-file-input.min.js'
                ]
            ]
        ],
        [
            'name' => 'Color picker',
            'active' => true,
            'files' =>[
                [
                    'type'=>'css',
                    'asset' =>true,
                    'location'=>'vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css'
                ],
                [
                    'type' => 'js',
                    'asset'=>true,
                    'location' =>'vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js'
                ]
            ]
        ]
    ],
];
