<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'detail',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function scopeSearch($query, $request)
    {
        // 名前検索（姓、名、フルネーム対応）
        if ($request->filled('keyword')) {
            $kw = $request->keyword;
            $query->where(function($q) use ($kw) {
                $q->where('first_name', 'like', "%$kw%")
                  ->orWhere('last_name', 'like', "%$kw%")
                  ->orWhereRaw('CONCAT(last_name, first_name) LIKE ?', ["%$kw%"])
                  ->orWhereRaw('CONCAT(last_name, " ", first_name) LIKE ?', ["%$kw%"]);
            });
        }

        // メールアドレス検索
        if ($request->filled('email')) {
            $query->where('email', 'like', "%{$request->email}%");
        }

        // 性別検索（全て以外の場合）
        if ($request->filled('gender') && $request->gender !== 'all') {
            $query->where('gender', $request->gender);
        }

        //お問い合わせの種類
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // 日付検索
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        return $query;
    }
}
