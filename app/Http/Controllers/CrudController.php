<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValiCrudRequest;

class CrudController extends Controller
{
    /**
     * 一覧表示
     */
    public function getIndex(Request $rq)
    {
        //キーワード受け取り
        $keyword = $rq->input('keyword');

        //クエリ生成
        $query = \App\Models\Student::query();

        //もしキーワードがあったら
        if(!empty($keyword))
        {
            $query->where('email','like','%'.$keyword.'%');
            $query->orWhere('name','like','%'.$keyword.'%');
        }

        // 全件取得 +ページネーション
        $students = $query->orderBy('id','desc')->paginate(5);
        return view('student.list')->with('students',$students)->with('keyword',$keyword);
    }
    /**
     * 新規登録（入力）
     */
    public function new_index()
    {
        return view('student.new_index');
    }

    /**
     * 新規登録（確認）
     */
    public function new_confirm(ValiCrudRequest $req)
    {
        $data = $req->all();
        return view('student.new_confirm')->with($data);
    }

    /**
     * 新規登録（登録）
     */
    public function new_finish(Request $request)
    {
        // Studentオブジェクト生成
        $student = new \App\Models\Student;

        // 値の登録
        $student->name = $request->name;
        $student->email = $request->email;
        $student->tel = $request->tel;
        $student->message = $request->message;

        // 保存
        $student->save();

        // 一覧にリダイレクト
        return redirect()->to('student/list')->with('flashmessage','登録が完了いたしました。');
    }
    
    /**
     * 編集画面（入力）
     */
    public function edit_index($id)
    {
        $student = \App\Models\Student::findOrFail($id);
        return view('student.edit_index')->with('student',$student);
    }

    /**
     * 編集画面（確認）
     */
    public function edit_confirm(\App\Http\Requests\ValiCrudRequest $req)
    {
        $data = $req->all();
        return view('student.edit_confirm')->with($data);
    }

    /**
     * 編集画面（完了）
     */
    public function edit_finish(Request $request, $id)
    {
        //該当レコードを抽出
        $student = \App\Models\Student::findOrFail($id);

        //値を代入
        $student->name = $request->name;
        $student->email = $request->email;
        $student->tel = $request->tel;
        $student->message = $request->message;

        //保存（更新）
        $student->save();

         //リダイレクト
         return redirect()->to('student/list')->with('flashmessage','更新が完了いたしました。');
    }
    /**
     * 詳細画面
     */
    public function detail_index($id)
    {
        $student = \App\Models\Student::findOrFail($id);
        return view('student.detail_index')->with('student',$student);
    }
    /**
     * 削除
     */
    public function us_delete($id)
    {
        // 削除対象レコードを検索
        $students = \App\Models\Student::find($id);
        // 削除
        $students->delete();
        // リダイレクト
        return redirect()->to('student/list')->with('flashmessage','削除が完了いたしました。');
    }
}
