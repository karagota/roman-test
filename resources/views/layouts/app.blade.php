<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.css" rel="stylesheet" type="text/css"/>
<style>
    summary {
        display: block;
        cursor: pointer;
        outline: 0;
    }

    summary::-webkit-details-marker {
        display: none;
    }

    .tree-nav__item {
        display: block;
        white-space: nowrap;
        position: relative;
    }
    .tree-nav__item.is-expandable::before {
        content: "";
        height: 100%;
        left: 0.8rem;
        position: absolute;
        top: 2.4rem;
        height: calc(100% - 2.4rem);
    }
    .tree-nav__item .tree-nav__item {
        margin-left: 2.4rem;
    }
    .tree-nav__item.is-expandable[open] > .tree-nav__item-title::before {
        font-family: "ionicons";
        transform: rotate(90deg);
    }
    .tree-nav__item.is-expandable > .tree-nav__item-title {
        padding-left: 2.4rem;
    }
    .tree-nav__item.is-expandable > .tree-nav__item-title::before {
        position: absolute;
        will-change: transform;
        transition: transform 300ms ease;
        font-family: "ionicons";
        content: "\f125";
        left: 0;
        display: inline-block;
        width: 1.6rem;
        text-align: center;
    }

    .tree-nav__item-title {
        cursor: pointer;
        display: block;
        outline: 0;
    }
    .tree-nav__item-title .icon {
        display: inline;
        padding-left: 1.6rem;
        margin-right: 0.8rem;
        position: relative;
    }
    .tree-nav__item-title .icon::before {
        top: 0;
        position: absolute;
        left: 0;
        display: inline-block;
        width: 1.6rem;
        text-align: center;
    }

    .tree-nav__item-title::-webkit-details-marker {
        display: none;
    }
</style>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
