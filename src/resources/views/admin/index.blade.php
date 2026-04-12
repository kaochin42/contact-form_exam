@extends('layouts.app')
@section('content')
<h2>Admin</h2>
<table class="admin-table">
    <tr>
        <th>お名前</th>
        <th>性別</th>
        <th>メールアドレス</th>
        <th>お問い合わせの種類</th>
        <th></th>
    </tr>
    @foreach($contacts as $contact)
    <tr>
        <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
        <td>{{ $contact->gender == 1 ? '男性' : ($contact->gender == 2 ? '女性' : 'その他') }}</td>
        <td>{{ $contact->email }}</td>
        <td>{{ $contact->category->content }}</td>
        <td>
            <input type="checkbox" id="modal-{{ $contact->id }}" class="modal-switch">
            <div class="modal-overlay">
                <div class="modal-window">
                    <label for="modal-{{ $contact->id }}" class="modal-close">×</label>
                    <table>
                        <tr>
                            <th>お名前</th>
                            <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                        </tr>
                        <tr>
                            <th>性別</th>
                            <td>{{ $contact->gender == 1 ? '男性' : ($contact->gender == 2 ? '女性' : 'その他') }}</td>
                        </tr>
                        <tr>
                            <th>メール</th>
                            <td>{{ $contact->email }}</td>
                        </tr>
                        <tr>
                            <th>電話</th>
                            <td>{{ $contact->tel }}</td>
                        </tr>
                        <tr>
                            <th>住所</th>
                            <td>{{ $contact->address }}</td>
                        </tr>
                        <tr>
                            <th>建物</th>
                            <td>{{ $contact->building }}</td>
                        </tr>
                        <tr>
                            <th>種類</th>
                            <td>{{ $contact->category->content }}</td>
                        </tr>
                        <tr>
                            <th>内容</th>
                            <td>{{ $contact->detail }}</td>
                        </tr>
                    </table>
                    <form action="/delete" method="post">
                        @csrf @method('DELETE')
                        <input type="hidden" name="id" value="{{ $contact->id }}">
                        <button type="submit">削除</button>
                    </form>
                </div>
            </div>
            <label for="modal-{{ $contact->id }}" class="detail-btn">詳細</label>
        </td>
    </tr>
    @endforeach
</table>
@endsection