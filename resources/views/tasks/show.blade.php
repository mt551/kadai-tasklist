@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
<div class="row">
<div class="col-lg-6 col-md-8 col-sm-8 col-xs-12 col-lg-offset-3 col-md-offset-2 col-sm-offset-2">
    <h1>id = {{ $task->id }} のタスク詳細ページ</h1>
    
    <p>ステータス: {{ $task->status }}</p>
    <p>{{ $task->content }}</p>

    {!! link_to_route('tasks.edit', 'このタスク編集', ['id' => $task->id], ['class' => 'btn btn-default']) !!}
    
    <div class="form-group">
    {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
    </div>
</div>
</div>
    
@endsection