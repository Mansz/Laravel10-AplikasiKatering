<?php

use App\Filament\Dashboards\Dashboard;
use Filament\Widgets\StatsOverviewWidget;

return [
    'dashboards' => [
    'default' => App\Filament\Dashboards\Dashboard::class,
],
    
    'navigation' => [
        'items' => [
            // Tambahkan item navigasi di sini
            [
                'label' => 'Orders',
                'url' => '/orders',
                'icon' => 'heroicon-o-shopping-cart',
            ],
            [
                'label' => 'Products',
                'url' => '/products',
                'icon' => 'heroicon-o-collection',
                ],
                [
                    'label' => 'Customers',
                    'url' => '/customers',
                    'icon' => 'heroicon-o-users',
                    ],
                    [
                        'label' => 'Reports',
                        'url' => '/reports',
                        'icon' => 'heroicon-o-chart-bar',
                        ],
                        
            // Tambahkan item lain sesuai kebutuhan
        ],
    ],

    'resources' => [
        // Daftar resource yang digunakan
        'orders' => [
            'label' => 'Orders',
            'url' => '/orders',
            'icon' => 'heroicon-o-shopping-cart',
            ],
        \App\Filament\Resources\OrderResource::class,
        // Tambahkan resource lain sesuai kebutuhan
    ],

    'widgets' => [
        // Daftar widget global jika ada
        StatsOverviewWidget::class,
        // Tambahkan widget lain sesuai kebutuhan
        // Contoh: App\Filament\Widgets\GlobalStats::class,
        
    ],

    'theme' => [
        'dark_mode' => true, // Atur mode gelap jika diinginkan
    ],

    /*
    |--------------------------------------------------------------------------
    | Broadcasting
    |--------------------------------------------------------------------------
    |
    | By uncommenting the Laravel Echo configuration, you may connect Filament
    | to any Pusher-compatible websockets server.
    |
    */

    'broadcasting' => [
        // 'echo' => [
        //     'broadcaster' => 'pusher',
        //     'key' => env('VITE_PUSHER_APP_KEY'),
        //     'cluster' => env('VITE_PUSHER_APP_CLUSTER'),
        //     'wsHost' => env('VITE_PUSHER_HOST'),
        //     'wsPort' => env('VITE_PUSHER_PORT'),
        //     'wssPort' => env('VITE_PUSHER_PORT'),
        //     'authEndpoint' => '/broadcasting/auth',
        //     'disableStats' => true,
        //     'encrypted' => true,
        //     'forceTLS' => true,
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | This is the storage disk Filament will use to store files. You may use
    | any of the disks defined in the `config/filesystems.php`.
    |
    */

    'default_filesystem_disk' => env('FILAMENT_FILESYSTEM_DISK', 'public'),

    /*
    |--------------------------------------------------------------------------
    | Assets Path
    |--------------------------------------------------------------------------
    |
    | This is the directory where Filament's assets will be published to. It
    | is relative to the `public` directory of your Laravel application.
    |
    */

    'assets_path' => null,

    /*
    |--------------------------------------------------------------------------
    | Cache Path
    |--------------------------------------------------------------------------
    |
    | This is the directory that Filament will use to store cache files that
    | are used to optimize the registration of components.
    |
    */

    'cache_path' => base_path('bootstrap/cache/filament'),

    /*
    |--------------------------------------------------------------------------
    | Livewire Loading Delay
    |--------------------------------------------------------------------------
    |
    | This sets the delay before loading indicators appear.
    |
    */

    'livewire_loading_delay' => 'default',
];