<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task01; // モデルと紐づける

class TaskController extends Controller
{
/**
     * コンストラクタ
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * タスク一覧
     * 
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        // データベースからタスク一覧を取得
        // $tasks = Task01::orderBy('created_at','asc')->get();
        //　$request->user()にて認証済みのユーザーを取得し、tasks()->get()でそのユーザーが保持するタスクを取得する
        $tasks = $request->user()->tasks()->get();
        // tasks > index.blade.php を使用する
        return view('tasks.index',[
            'tasks' => $tasks,
        ]);
    }

    /**
     * タスク登録
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        // パラメーターが有効かどうかのバリデーション
        $this->validate($request, [
            // name パラメーターが必須で、最大255文字を指定
            'name' => 'required|max:255',
        ]);

        // タスク作成
        // Task01::create([
        //     'user_id' => 0,
        //     'name' => $request->name
        // ]);

        $request->user()->tasks()->create([
            'name' => $request('test')
        ])

        // tasks > index.blade.php にリダイレクト
        return redirect('test');
    }

        /**
     * タスク削除
     *
     * @param Request $request
     * @param Task $task
     * @return Response
     */
    public function destroy(Request $request, Task01 $task)
    {
        $task->delete();
        // tasks > index.blade.php にリダイレクト
        return redirect('test');
    }
}