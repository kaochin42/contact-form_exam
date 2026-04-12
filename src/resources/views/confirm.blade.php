@extends('layouts.app')
@section('content')
<h2>Confirm</h2>
<form action="/thanks" method="post">
    @csrf
    <table>
        <tr>
            <th>お名前</th>
            <td>{{ $contact['last_name'] }} {{ $contact['first_name'] }}</td>
        </tr>
        <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
        <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">

        <tr>
            <th>性別</th>
            <td>{{ $contact['gender'] == 1 ? '男性' : ($contact['gender'] == 2 ? '女性' : 'その他') }}</td>
        </tr>
        <input type="hidden" name="gender" value="{{ $contact['gender'] }}">

        <tr>
            <th>メールアドレス</th>
            <td>{{ $contact['email'] }}</td>
        </tr>
        <input type="hidden" name="email" value="{{ $contact['email'] }}">

        <tr>
            <th>電話番号</th>
            <td>{{ $contact['tel1'] }}{{ $contact['tel2'] }}{{ $contact['tel3'] }}</td>
        </tr>
        <input type="hidden" name="tel1" value="{{ $contact['tel1'] }}">
        <input type="hidden" name="tel2" value="{{ $contact['tel2'] }}">
        <input type="hidden" name="tel3" value="{{ $contact['tel3'] }}">

        <tr>
            <th>住所</th>
            <td>{{ $contact['address'] }}</td>
        </tr>
        <input type="hidden" name="address" value="{{ $contact['address'] }}">

        <tr>
            <th>建物名</th>
            <td>{{ $contact['building'] }}</td>
        </tr>
        <input type="hidden" name="building" value="{{ $contact['building'] }}">

        <tr>
            <th>お問い合わせの種類</th>
            <td>{{ $contact['category_id'] }}</td>
        </tr>
        <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">

        <tr>
            <th>お問い合わせ内容</th>
            <td>{{ $contact['detail'] }}</td>
        </tr>
        <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
    </table>
    <div>
        <button type="submit">送信</button>
        <button type="submit" name="back" value="true">修正</button>
    </div>
</form>
@endsection