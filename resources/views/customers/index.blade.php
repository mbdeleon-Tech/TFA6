@extends('layouts.app')
@section('title', 'Customer Accounts')
@section('content')
    <div class="page-heading"><div><p class="eyebrow">THE PEOPLE YOU SERVE</p><h1>Customer Accounts</h1><p class="subtitle">A clearer view of your customer community.</p></div><span class="edition">CUSTOMER DIRECTORY</span></div>
    <section class="stats" aria-label="Customer summary"><div class="stat"><span>Total customers</span><strong>{{ $customers->count() }}<small>database records</small></strong></div><div class="stat"><span>Contact fields</span><strong>3<small>per customer</small></strong></div><div class="stat"><span>Source</span><strong>Eloquent<small>model query</small></strong></div></section>
    <section class="directory" aria-labelledby="directory-title"><div class="directory-heading"><div><h2 id="directory-title">Customer directory <span class="count-badge">{{ count($customers) }}</span></h2><p>Contact details and account information at a glance.</p></div><span class="sample-tag">Sample data</span></div><div class="table-scroll" role="region" aria-label="Customer accounts table" tabindex="0"><table><caption class="sr-only">Fictional customer accounts, contact details, cities, and statuses</caption><thead><tr><th scope="col">Customer</th><th scope="col">Account ID</th><th scope="col">Phone</th><th scope="col">City</th><th scope="col">Status</th></tr></thead><tbody>
    @foreach ($customers as $customer)
        <tr><td><div class="person"><span class="avatar tone-{{ $loop->index % 3 }}" aria-hidden="true">{{ collect(explode(' ', $customer->full_name))->map(fn ($part) => mb_substr($part, 0, 1))->join('') }}</span><span><strong>{{ $customer->full_name }}</strong><span class="email">{{ $customer->email }}</span></span></div></td><td class="record-id">CUS-{{ str_pad($customer->id, 3, '0', STR_PAD_LEFT) }}</td><td>{{ $customer->phone }}</td><td>Customer account</td><td><span class="status is-active"><span aria-hidden="true">●</span> Active</span></td></tr>
    @endforeach
    </tbody></table></div><div class="table-footer"><span>Showing {{ $customers->count() }} of {{ $customers->count() }} customers</span><span>All database records</span></div></section>
    <div class="info-strip"><span class="info-symbol" aria-hidden="true">i</span><p>These fictional records are provided for demonstration. No real customer information is stored.</p></div>
@endsection
