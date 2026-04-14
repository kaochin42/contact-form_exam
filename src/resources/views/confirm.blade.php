@extends('layouts.app')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endpush
@section('content')
<div class="container">
    <h2 class="page-title">Confirm</h2>
    <div class="confirm-wrap">
        <form action="/thanks" method="post">
            @csrf
            <table class="confirm-table">
                <tr>
                    <th class="confirm-th">お名前</th>
                    <td class="confirm-td">{{ $contact['last_name'] }}　{{ $contact['first_name'] }}</td>
                </tr>
                <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
                <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">

                <tr>
                    <th class="confirm-th">性別</th>
                    <td class="confirm-td">{{ $contact['gender'] == 1 ? '男性' : ($contact['gender'] == 2 ? '女性' : 'その他') }}</td>
                </tr>
                <input type="hidden" name="gender" value="{{ $contact['gender'] }}">

                <tr>
                    <th class="confirm-th">メールアドレス</th>
                    <td class="confirm-td">{{ $contact['email'] }}</td>
                </tr>
                <input type="hidden" name="email" value="{{ $contact['email'] }}">

                <tr>
                    <th class="confirm-th">電話番号</th>
                    <td class="confirm-td">{{ $contact['tel1'] }}-{{ $contact['tel2'] }}-{{ $contact['tel3'] }}</td>
                </tr>
                <input type="hidden" name="tel1" value="{{ $contact['tel1'] }}">
                <input type="hidden" name="tel2" value="{{ $contact['tel2'] }}">
                <input type="hidden" name="tel3" value="{{ $contact['tel3'] }}">

                <tr>
                    <th class="confirm-th">住所</th>
                    <td class="confirm-td">{{ $contact['address'] }}</td>
                </tr>
                <input type="hidden" name="address" value="{{ $contact['address'] }}">

                <tr>
                    <th class="confirm-th">建物名</th>
                    <td class="confirm-td">{{ $contact['building'] }}</td>
                </tr>
                <input type="hidden" name="building" value="{{ $contact['building'] }}">

                <tr>
                    <th class="confirm-th">お問い合わせの種類</th>
                    <td class="confirm-td">{{ $category->content }}</td>
                </tr>
                <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">

                <tr>
                    <th class="confirm-th">お問い合わせ内容</th>
                    <td class="confirm-td">{{ $contact['detail'] }}</td>
                </tr>
                <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
            </table>
            <div class="confirm-actions">
                <button type="submit" class="btn btn-primary">送信</button>
                <button type="submit" name="back" value="true" class="btn btn-secondary">修正</button>
            </div>
        </form>
    </div>
</div>
@endsection