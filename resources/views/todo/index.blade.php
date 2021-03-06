@extends ('layouts.app') <!-- 親ファイルを継承する -->
@section ('content') <!-- イールドに挿入する -->

<h1 class="page-header">{{ Auth::user()->name }}のToDo一覧</h1>
<p class="text-right">
  <a class="btn btn-success" href="/todo/create">新規作成</a><!-- * aタグで送られる場合はGET -->
</p>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th>ID</th>
      <th>やること</th>
      <th>作成日時</th>
      <th>更新日時</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($todos as $todo) <!-- $todosはコレクションで配列としてラッピングされたモデルが入っている $todo Model一ずつ入っています Todoインスタンスが入っている -->
      <tr>
        <td class="align-middle">{{ $todo->id }}</td>
        <td class="align-middle">{{ $todo->title }}</td>
        <td class="align-middle">{{ $todo->created_at }}</td>
        <td class="align-middle">{{ $todo->updated_at }}</td>
        <td><a class="btn btn-primary" href="{{ route('todo.edit', $todo->id) }}">編集</a></td><!-- html作成時にrouteメソッドが作成されており -->
        <td>
          {!! Form::open(['route' => ['todo.destroy', $todo->id], 'method' => 'DELETE']) !!} 
            {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
          {!! Form::close() !!}
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection <!-- 追記 -->