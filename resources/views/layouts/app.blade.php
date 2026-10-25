<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Counterpoint POS customer and team account directories.">
    <title>@yield('title') | Counterpoint POS</title>
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <a class="skip-link" href="#main">Skip to content</a>
    <aside class="sidebar">
        <a class="brand" href="{{ route('home') }}"><span class="brand-mark" aria-hidden="true">c.</span><span>counterpoint<span class="brand-subtitle">POINT OF SALE</span></span></a>
        <p class="nav-label">WORKSPACE</p>
        <nav aria-label="Main navigation">
            <a href="{{ route('home') }}" @class(['nav-link', 'active' => request()->routeIs('home')]) @if(request()->routeIs('home')) aria-current="page" @endif><span class="nav-icon" aria-hidden="true">⌂</span>Overview</a>
            <a href="{{ route('customers.index') }}" @class(['nav-link', 'active' => request()->routeIs('customers.*')]) @if(request()->routeIs('customers.*')) aria-current="page" @endif><span class="nav-icon" aria-hidden="true">◎</span>Customer Accounts</a>
            <a href="{{ route('users.index') }}" @class(['nav-link', 'active' => request()->routeIs('users.*')]) @if(request()->routeIs('users.*')) aria-current="page" @endif><span class="nav-icon" aria-hidden="true">▦</span>User Accounts</a>
            <a href="{{ route('about') }}" @class(['nav-link', 'active' => request()->routeIs('about')]) @if(request()->routeIs('about')) aria-current="page" @endif><span class="nav-icon" aria-hidden="true">ⓘ</span>About</a>
        </nav>
        <div class="sidebar-note"><span class="live-dot"></span>A foundation for your store<p>People, accounts, and a clearer view of your workspace.</p></div>
        <div class="sidebar-footer"><span class="avatar small">CP</span><span>Counterpoint POS<small>Foundation edition</small></span></div>
    </aside>
    <div class="workspace">
        <header class="topbar"><span>Workspace <span class="breadcrumb-divider">/</span> <strong>@yield('title')</strong></span><span class="demo-label"><span class="live-dot"></span>Demo workspace</span></header>
        <main id="main" tabindex="-1">@yield('content')</main>
        <footer class="page-footer"><span>Counterpoint POS</span><span>IT0049 · Laravel POS Foundations</span></footer>
    </div>
</body>
</html>
