@extends('layouts.app')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endpush
@section('content')
<div class="auth-wrap">
    <h2 class="page-title">Login</h2>
    <div class="auth-card">
        <form action="/login" method="post">
            @csrf
            <div class="auth-field">
                <label class="auth-label">メールアドレス</label>
                <input class="auth-input" type="text" name="email" value="{{ old('email') }}" placeholder="例: test@example.com">
                @error('email')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="auth-field">
                <label class="auth-label">パスワード</label>
                <input class="auth-input" type="password" name="password" placeholder="例: coachtech1106">
                @error('password')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="auth-actions">
                <button class="btn btn-primary" type="submit">ログイン</button>
            </div>
        </form>
    </div>
</div>
@endsection