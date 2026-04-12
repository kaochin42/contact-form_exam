@extends('layouts.app')
@section('content')
<h2>Login</h2>
<form action="/login" method="post">
    @csrf
    <table>
        <tr>
            <th>メールアドレス</th>
            <td>
                <input type="email" name="email" value="{{ old('email') }}">
                @error('email')
                <div>{{ $message }}</div>
                @enderror
            </td>
        </tr>

        <tr>
            <th>パスワード</th>
            <td>
                <input type="password" name="password">
                @error('password')
                <div>{{ $message }}</div>
                @enderror
            </td>
        </tr>
    </table>
    <div>
        <button type="submit">ログイン</button>
    </div>
</form>
@endsection