@extends('layouts.app')
@section('title', 'Overview')
@section('content')
    <div class="page-heading"><div><p class="eyebrow">YOUR STORE, CONNECTED</p><h1>A good day starts here.</h1><p class="subtitle">Welcome to Counterpoint. Keep your people and accounts in one place.</p></div><span class="edition">FOUNDATION / 01</span></div>
    <section class="hero" aria-labelledby="hero-title">
        <div class="hero-copy"><span class="pill">THE PEOPLE BEHIND YOUR BUSINESS</span><h2 id="hero-title">Small details.<br>Stronger connections.</h2><p>Get to know your customers and the team that keeps your store moving. Your next step is just a click away.</p><a class="button light" href="{{ route('customers.index') }}">Explore customer accounts <span aria-hidden="true">↗</span></a></div>
        <div class="hero-art" aria-hidden="true"><div class="orbit orbit-one"></div><div class="orbit orbit-two"></div><div class="receipt"><div class="receipt-brand">c.</div><strong>Good things<br>start at the counter.</strong><div class="receipt-rule"></div><div class="receipt-line"><span>People</span><span>Connected</span></div><div class="receipt-line"><span>Workspace</span><span>Organized</span></div><div class="barcode"></div><small>COUNTERPOINT POS</small></div><span class="floating-tag">Made for everyday business ↗</span></div>
    </section>
    <div class="section-heading"><h2>Your workspace at a glance</h2><span>Start with the essentials</span></div>
    <div class="card-grid">
        <a class="feature-card" href="{{ route('customers.index') }}"><span class="feature-icon mint" aria-hidden="true">◎</span><span class="card-arrow" aria-hidden="true">↗</span><h3>Customer Accounts</h3><p>A simple directory of the people you serve, with contact details and account status.</p><span class="text-link">View customers →</span></a>
        <a class="feature-card" href="{{ route('users.index') }}"><span class="feature-icon lavender" aria-hidden="true">▦</span><span class="card-arrow" aria-hidden="true">↗</span><h3>User Accounts</h3><p>Meet your store team. Browse their assigned roles, branches, and account status.</p><span class="text-link">View team →</span></a>
        <a class="feature-card" href="{{ route('about') }}"><span class="feature-icon peach" aria-hidden="true">ⓘ</span><span class="card-arrow" aria-hidden="true">↗</span><h3>About Counterpoint</h3><p>Discover the purpose of this project and how its four pages fit together.</p><span class="text-link">Get to know the project →</span></a>
    </div>
    <div class="info-strip"><span class="info-symbol" aria-hidden="true">i</span><p><strong>A workspace to explore.</strong> This foundation edition uses fictional sample accounts for demonstration.</p><span class="strip-tag">TFA5</span></div>
@endsection
