@extends('layouts.app')
@section('content')
<h2>Contact</h2>
<form action="/confirm" method="post">
    @csrf
    <table>
        <!-- 名前 -->
        <tr>
            <th>お名前<span>※</span></th>
            <td>
                <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="例: 山田">
                <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="例: 太郎">
                @error('last_name')
                <div>{{ $message }}</div>
                @enderror
                @error('first_name')
                <div>{{ $message }}</div>
                @enderror
            </td>
        </tr>

        <!-- 性別 -->
        <tr>
            <th>性別<span>※</span></th>
            <td>
                <input type="radio" name="gender" value="1" id="male" {{ old('gender', '1') == '1' ? 'checked' : '' }}><label for="male">男性</label>
                <input type="radio" name="gender" value="2" id="female" {{ old('gender') == '2' ? 'checked' : '' }}><label for="female">男性</label>
                <input type="radio" name="gender" value="3" id="other" {{ old('gender') == '3' ? 'checked' : '' }}><label for="other">その他</label>
                @error('gender')
                <div>{{ $message }}</div>
                @enderror
            </td>
        </tr>

        <!-- メールアドレス -->
        <tr>
            <th>メールアドレス<span>※</span></th>
            <td>
                <input type="email" value="{{ old('email') }}" placeholder="例: test@example.com">
                @error('email')
                <div>{{ $message }}</div>
                @enderror
            </td>
        </tr>

        <!-- 電話番号 -->
        <tr>
            <th>電話番号<span>※</span></th>
            <td>
                <input type="text" name="tel1" value="{{ old('tel1') }}" size="3"> -
                <input type="text" name="tel2" value="{{ old('tel2') }}" size="4"> -
                <input type="text" name="tel3" value="{{ old('tel3') }}" size="4">
            <!-- 一旦それぞれの下に出るスタイル -->
                @error('tel1')
                <div>{{ $message }}</div>
                @enderror
                @error('tel2')
                <div>{{ $message }}</div>
                @enderror
                @error('tel3')
                <div>{{ $message }}</div>
                @enderror
            </td>
        </tr>

        <!-- 住所 -->
        <tr>
            <th>住所<span>※</span></th>
            <td>
                <input type="text" name="address" value="{{ old('address') }}" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3">
                @error('address')
                <div>{{ $message }}</div>
                @enderror
            </td>
        </tr>

        <!-- 建物名 -->
        <tr>
            <th>建物名</th>
            <td>
                <input type="text" name="building" value="{{ old('building') }}" placeholder="例: 千駄ヶ谷マンション123">
            </td>
        </tr>

        <!-- お問い合わせの種類 -->
        <tr>
            <th>お問い合わせの種類<span>※</span></th>
            <td>
                <select name="category_id">
                    <option value="" disabled {{ old('category_id') == '' ? 'selected' : '' }}>選択してください</option>
                    @foreach($categories as $category)
                    <option value="{{ category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->content }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <div>{{ $message }}</div>
                @enderror
            </td>
        </tr>

        <!-- お問い合わせ内容 -->
        <tr>
            <th>お問い合せ内容<span>※</span></th>
            <td>
                <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                @error('detail')
                <div>{{ $message }}</div>
                @enderror
            </td>
        </tr>
    </table>

    <div>
        <button type="submit">確認画面</button>
    </div>
</form>
@endsection