@extends('layouts.app')
@section('title', 'User Accounts')
@section('content')
    <div class="page-heading"><div><p class="eyebrow">THE TEAM BEHIND YOUR STORE</p><h1>User Accounts</h1><p class="subtitle">Know your team and where everyone fits in.</p></div><span class="edition">TEAM DIRECTORY</span></div>
    <section class="stats" aria-label="User summary"><div class="stat"><span>Total users</span><strong>{{ $users->count() }}<small>database records</small></strong></div><div class="stat"><span>Unique usernames</span><strong>{{ $users->pluck('username')->unique()->count() }}<small>enforced by schema</small></strong></div><div class="stat"><span>Source</span><strong>Eloquent<small>model query</small></strong></div></section>
    <section class="directory" aria-labelledby="directory-title"><div class="directory-heading"><div><h2 id="directory-title">Team directory <span class="count-badge">{{ count($users) }}</span></h2><p>The people who keep everyday business moving.</p></div><span class="sample-tag">Sample data</span></div><div class="table-scroll" role="region" aria-label="User accounts table" tabindex="0"><table><caption class="sr-only">Fictional user accounts, roles, branches, and statuses</caption><thead><tr><th scope="col">Team member</th><th scope="col">Account ID</th><th scope="col">Role</th><th scope="col">Branch</th><th scope="col">Status</th></tr></thead><tbody>
    @foreach ($users as $user)
        <tr><td><div class="person"><span class="avatar tone-{{ $loop->index % 3 }}" aria-hidden="true">{{ collect(explode(' ', $user->full_name))->map(fn ($part) => mb_substr($part, 0, 1))->join('') }}</span><span><strong>{{ $user->full_name }}</strong><span class="email">{{ '@' . $user->username }}</span></span></div></td><td class="record-id">USR-{{ str_pad($user->id, 3, '0', STR_PAD_LEFT) }}</td><td><span class="role">Staff user</span></td><td>Northstar POS</td><td><span class="status is-active"><span aria-hidden="true">●</span> Active</span></td></tr>
    @endforeach
    </tbody></table></div><div class="table-footer"><span>Showing {{ $users->count() }} of {{ $users->count() }} users</span><span>All database records</span></div></section>
    <div class="info-strip"><span class="info-symbol" aria-hidden="true">i</span><p>Usernames are unique database fields, and every row is retrieved through the User Eloquent model.</p></div>
@endsection
