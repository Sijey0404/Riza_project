@extends('layout.layout1')

@section('content')
<style>
    .dashboard-wrapper {
        max-width: 800px;
        margin: 60px auto;
        background-color: #ffffff;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
        font-family: 'Segoe UI', sans-serif;
        color: #111827;
    }

    .dashboard-wrapper h1 {
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 20px;
        color: #000000;
        text-align: center;
    }

    .dashboard-wrapper h2 {
        font-size: 22px;
        font-weight: 600;
        margin-top: 30px;
        margin-bottom: 15px;
        color: #1f2937;
        border-bottom: 2px solid #e5e7eb;
        padding-bottom: 6px;
    }

    .dashboard-wrapper ul {
        list-style: none;
        padding-left: 0;
    }

    .dashboard-wrapper li {
        padding: 10px 0;
        border-bottom: 1px solid #e5e7eb;
        color: #374151;
    }

    .alert {
        padding: 12px 16px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-weight: 500;
    }

    .alert-success {
        background-color: #e6f7ed;
        color: #065f46;
        border: 1px solid #10b981;
    }

    .alert-info {
        background-color: #e0f2fe;
        color: #0369a1;
        border: 1px solid #38bdf8;
    }

    .alert-error {
        background-color: #fee2e2;
        color: #991b1b;
        border: 1px solid #f87171;
    }
</style>

<div class="dashboard-wrapper">
    <h1>Welcome, {{ session('user')->username }}</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('message'))
        <div class="alert alert-info">
            {{ session('message') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-error">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <h2>Registered Users</h2>
    <ul>
        @foreach(App\Models\UserAccount::all() as $user)
            <li>{{ $user->username }}</li>
        @endforeach
    </ul>
</div>
@endsection
