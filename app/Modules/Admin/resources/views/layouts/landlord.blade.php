<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>{{ get_tenant()->name }}</title>
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('assets/favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">
    <!-- Icons-->
    <link href="{{ asset('css/free.min.css') }}" rel="stylesheet"> <!-- icons -->
    <link href="{{ asset('css/flag.min.css') }}" rel="stylesheet"> <!-- icons -->
    <!-- Main styles for this application-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-pro.css') }}" rel="stylesheet">
    <link href="{{ asset('css/brand.min.css') }}" rel="stylesheet"> <!-- icons -->

    @stack('css')

    <link href="{{ asset('css/coreui-chartjs.css') }}" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    @livewireStyles
</head>
<body class="c-app">
@livewire('container')
<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand">
        <img class="c-sidebar-brand-full" src="{{ asset('assets/brand/coreui-base-white.svg') }}" width="118"
             height="46" alt="CoreUI Logo">
        <img class="c-sidebar-brand-minimized" src="{{ asset('assets/brand/coreui-signet-white.svg') }}" width="118"
             height="46" alt="CoreUI Logo"></div>
    <ul class="c-sidebar-nav">
        @if(\Illuminate\Support\Facades\Route::has('admin.dashboard'))
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('admin.dashboard') }}">
                    <x-c-icon icon="home" class="c-sidebar-nav-icon"/>
                    @lang('landlord.dashboard')
                </a>
            </li>
        @endif
        @if(\Illuminate\Support\Facades\Route::has('admin.companies.index'))
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('admin.companies.index') }}">
                    <x-c-icon icon="industry" class="c-sidebar-nav-icon"/>
                    @lang('landlord.companies')
                </a>
            </li>
        @endif
        @if(\Illuminate\Support\Facades\Route::has('admin.menus.index'))
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('admin.menus.index') }}">
                    <x-c-icon icon="list" class="c-sidebar-nav-icon"/>
                    @lang('landlord.menus')
                </a>
            </li>
        @endif
        @if(\Illuminate\Support\Facades\Route::has('admin.sub-menus.index'))
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('admin.sub-menus.index') }}">
                    <x-c-icon icon="list-rich" class="c-sidebar-nav-icon"/>
                    @lang('landlord.sub-menus')
                </a>
            </li>
        @endif
        @if(\Illuminate\Support\Facades\Route::has('admin.sub-menus.manager'))
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('admin.sub-menus.manager') }}">
                    <x-c-icon icon="list-rich" class="c-sidebar-nav-icon"/>
                    @lang('landlord.sub-menus-manager')
                </a>
            </li>
        @endif
        @if(\Illuminate\Support\Facades\Route::has('admin.roles.index'))
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('admin.roles.index') }}">
                    <x-c-icon icon="lock-locked" class="c-sidebar-nav-icon"/>
                    @lang('landlord.roles')
                </a>
            </li>
        @endif

        @if(\Illuminate\Support\Facades\Route::has('admin.permissions.index'))
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('admin.permissions.index') }}">
                    <x-c-icon icon="lock-unlocked" class="c-sidebar-nav-icon"/>
                    @lang('landlord.permissions')
                </a>
            </li>
        @endif

        @if(\Illuminate\Support\Facades\Route::has('admin.icons.index'))
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('admin.icons.index') }}">
                    <x-c-icon icon="applications" class="c-sidebar-nav-icon"/>
                    @lang('landlord.icons')
                </a>
            </li>
        @endif

        @if(\Illuminate\Support\Facades\Route::has('admin.icons-brands.index'))
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('admin.icons-brands.index') }}">
                    <x-c-icon icon="bold" class="c-sidebar-nav-icon"/>
                    @lang('landlord.icons-brands')
                </a>
            </li>
        @endif

        @if(\Illuminate\Support\Facades\Route::has('logout'))
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('logout') }}">
                    <x-c-icon icon="account-logout" class="c-sidebar-nav-icon"/>
                    @lang('landlord.logout')
                </a>
            </li>
        @endif
    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
            data-class="c-sidebar-minimized"></button>
</div>
<div class="c-wrapper">
    @livewire('lv-admin::shared.header')
    <div class="c-body">
        <main class="c-main">
            {{ $slot }}
        </main>
        @livewire('lv-admin::shared.footer')
    </div>
</div>
<!-- CoreUI and necessary plugins-->
<script src="{{ asset('js/coreui.bundle.min.js') }}"></script>
<script src="{{ asset('js/coreui-utils.js') }}"></script>
<script src="{{ asset('js/ck-editor/ckeditor.js') }}"></script>
@livewireScripts
<script src="{{ asset('js/app.js') }}"></script>
@stack('js')
@stack('jsLivewire')
</body>
</html>
