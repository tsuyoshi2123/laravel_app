<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;// 
use App\Todo;   //
use Auth;  // 追記

class TodoController extends Controller
{
    private $todo; //クラス内でしか使用できない変数 メンバ変数

    public function __construct(Todo $instanceClass) //Todoクラスをインスタンス化して $instanceClassに渡す コンストラクタはインスタンスが生成されるときに実行されるメソッド
    {
        $this->middleware('auth');  //ルートミドルウェアに 追記する事によってログインしないと一覧に飛ばない    Kanel.php->Authenticate 呼び出し
        $this->todo = $instanceClass;  //インスタンス化したものを$this->todoに格納します
    }

    /**
     * 一覧ページ
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //$this->todo 説明:Modelクラスを継承したTodoクラスをインスタンス化したもの
    {
        // $todos = $this->todo->all();
        $todos = $this->todo->getByUserId(Auth::id());  //現在認証されているユーザーのID取得
        return view('todo.index', compact('todos'));  // compactで変数がキー 変数の値がバリューの配列としてindex.bladeに挿入される
    }
    
    /**
     * 新規作成
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * 保存する場所
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //
    {
        $input = $request->all();  //
        $input['user_id'] = Auth::id();  // 現在認証(ログイン)されているユーザーのIDを取得しuser_idカラムに格納
        $this->todo->fill($input)->save(); // 
        return redirect()->route('todo.index');//
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * 編集
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = $this->todo->find($id);  //
        return view('todo.edit', compact('todo'));  // 
    }

    /**
     * 編集保存
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) //Requestは何をしているか        (postで送られた情報をRequestクラスのインスタンス化している)
    {
        $input = $request->all(); //$input 説明:postで送られてきた情報の変更した値が配列として返ってくる
        $this->todo->find($id)->fill($input)->save(); //store との違いは findがあるかないか findで既存の情報を取得してsave()のなかで laravel側で元のレコードの情報と更新したいレコードの情報を比較して変更箇所があった場合更新してくれる
        return redirect()->route('todo.index'); //リダレクトでパス指定している
    }

    /**
     *消去
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->todo->find($id)->delete();
        return redirect()->route('todo.index');
    }
}