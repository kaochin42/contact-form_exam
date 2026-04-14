@extends('layouts.app')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush
@section('content')
<div class="container">
    <h2 class="page-title">Admin</h2>

    {{-- 検索フォーム --}}
    <form action="/search" method="get" class="search-form">
        <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="名前やメールアドレスを入力してください" class="search-input">
        <select name="gender" class="search-select">
            <option value="">性別</option>
            <option value="1" {{ request('gender') == '1' ? 'selected' : '' }}>男性</option>
            <option value="2" {{ request('gender') == '2' ? 'selected' : '' }}>女性</option>
            <option value="3" {{ request('gender') == '3' ? 'selected' : '' }}>その他</option>
        </select>
        <select name="category_id" class="search-select">
            <option value="">お問い合わせの種類</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->content }}</option>
            @endforeach
        </select>
        <input type="date" name="date" value="{{ request('date') }}" class="search-date">
        <button type="submit" class="search-btn">検索</button>
        <a href="/admin" class="search-reset">リセット</a>
    </form>

    {{-- エクスポート & ページネーション --}}
    <div class="admin-toolbar">
        <a href="/export?{{ http_build_query(request()->query()) }}" class="export-btn">エクスポート</a>
        <div>
            {{ $contacts->appends(request()->query())->links() }}
        </div>
    </div>

    {{-- 一覧テーブル --}}
    <table class="data-table">
        <thead>
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->last_name }}　{{ $contact->first_name }}</td>
                <td>{{ $contact->gender == 1 ? '男性' : ($contact->gender == 2 ? '女性' : 'その他') }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->category->content }}</td>
                <td>
                    <input type="checkbox" id="modal-{{ $contact->id }}" class="modal-switch">
                    <div class="modal-overlay">
                        <div class="modal-window">
                            <label for="modal-{{ $contact->id }}" class="modal-close">×</label>
                            <table class="modal-table">
                                <tr>
                                    <th>お名前</th>
                                    <td>{{ $contact->last_name }}　{{ $contact->first_name }}</td>
                                </tr>
                                <tr>
                                    <th>性別</th>
                                    <td>{{ $contact->gender == 1 ? '男性' : ($contact->gender == 2 ? '女性' : 'その他') }}</td>
                                </tr>
                                <tr>
                                    <th>メールアドレス</th>
                                    <td>{{ $contact->email }}</td>
                                </tr>
                                <tr>
                                    <th>電話番号</th>
                                    <td>{{ $contact->tel }}</td>
                                </tr>
                                <tr>
                                    <th>住所</th>
                                    <td>{{ $contact->address }}</td>
                                </tr>
                                <tr>
                                    <th>建物名</th>
                                    <td>{{ $contact->building }}</td>
                                </tr>
                                <tr>
                                    <th>お問い合わせの種類</th>
                                    <td>{{ $contact->category->content }}</td>
                                </tr>
                                <tr>
                                    <th>お問い合わせ内容</th>
                                    <td>{{ $contact->detail }}</td>
                                </tr>
                            </table>
                            <div class="modal-actions">
                                <form action="/delete" method="post">
                                    @csrf @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $contact->id }}">
                                    <button type="submit" class="btn btn-danger">削除</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <label for="modal-{{ $contact->id }}" class="detail-btn">詳細</label>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection