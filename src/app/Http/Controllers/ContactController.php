<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ContactController extends Controller
{
    // PG01: 入力画面表示
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    // PG02: 確認画面
    public function confirm(ContactRequest $request)
    {
        $contact = $request->all();

        $category = Category::find($request->category_id);

        return view('confirm', compact('contact', 'category'));
    }

    // PG03: 保存・完了
    public function store(Request $request)
    {
        if($request->input('back')) {
            return redirect('/')->withInput();
        }

        $data = $request->all();

        $data['tel'] = $request->tel1 . $request->tel2 . $request->tel3;

        Contact::create($data);

        return view('thanks');
    }

    // PG04 & PG06: 管理画面・検索リセット
    public function admin()
    {
        $contacts = Contact::with('category')->paginate(7);
        $categories = Category::all();

        return view('admin.index', compact('contacts', 'categories'));
    }

    // PG05: 検索
    public function search(Request $request)
    {
        $contacts = Contact::with('category')
            ->search($request)
            ->paginate(7);

        $categories = Category::all();

        return view('admin.index', compact('contacts', 'categories'));
    }

    // PG06: 検索リセット
    public function reset()
    {
        return redirect('/admin');
    }

    // PG07: 削除
    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();

        return redirect('/admin');
    }

    // PG11: エクスポート
    public function export(Request $request)
    {
        // 現在の検索条件を維持した状態でデータを取得
        $contacts = Contact::search($request)->get();

        $response = new StreamedResponse(function () use ($contacts) {
            $handle = fopen('php://output', 'w');

            // CSVヘッダー
            fputcsv($handle, ['id', 'category_id', 'first_name', 'last_name', 'gender', 'email', 'tel', 'address', 'building', 'detail']);

            foreach ($contacts as $contact) {
                fputcsv($handle, [
                    $contact->id,
                    $contact->category_id,
                    $contact->first_name,
                    $contact->last_name,
                    $contact->gender,
                    $contact->email,
                    $contact->tel,
                    $contact->address,
                    $contact->building,
                    $contact->detail,
                ]);
            }
            fclose($handle);
        }, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="contacts_' . date('Ymd') . '.csv"',
        ]);
        
        return $response;
    }
}
