<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Task;    // 追加

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Task のレコードの一覧表示
        $tasks = Task::all();

        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task = new Task;

        return view('tasks.create', [
            'task' => $task,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'status' => 'required|max:10',   // 追加
        ]);
        
        //送られてきたフォームの内容は $request に入っています。したがって、 $request から content を取り出して、新規作成したメッセージに代入し、保存します。
        $task = new Task;
        $task->status = $request->status;    // 追加
        $task->content = $request->content;
        $task->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show アクションには $id の引数が与えられます。これは /tasks/1, /tasks/2 と言った URL にアクセスされたときに、 $id = 1 として代入されます。
        $task = Task::find($id);

        return view('tasks.show', [
            'task' => $task,    //$id が指定されているので、 Task::find($id) によって1つだけ取得します。そのため、 $task 変数も単数形の命名にしています。
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //edit アクションは create アクションと似ています。しかし、既存のメッセージレコードを編集することになるので、 id でメッセージレコードを検索することになります。
        $task = Task::find($id);

        return view('tasks.edit', [
            'task' => $task,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required|max:255',   // 追加
        ]);
        //edit が show と似ていたように、 update は store に似ています。そしてその違いも同様に $id で検索するところです。

        $task = Task::find($id);
        $task->status = $request->status;    // 追加
        $task->content = $request->content;
        $task->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $task = Task::find($id);
        $task->delete();

        return redirect('/');
    }
}
