@extends('layouts.app')

@section('content')
<h2>Register</h2>
<form action="/register" method="post">
    @csrf
    <table class="auth-table">
        <tr>
            <th>お名前</th>
            <td>
                <input type="text" name="name" value="{{ old('name') }}">
                @error('name')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </td>
        </tr>
        <tr>
            <th>メールアドレス</th>
            <td>
                <input type="email" name="email" value="{{ old('email') }}">
                @error('email')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </td>
        </tr>
        <tr>
            <th>パスワード</th>
            <td>
                <input type="password" name="password">
                @error('password')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </td>
        </tr>
    </table>
    <div class="form-btn">
        <button type="submit">登録</button>
    </div>
</form>
@endsection