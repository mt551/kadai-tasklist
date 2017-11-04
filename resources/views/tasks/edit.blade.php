@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
<div class="row">
<div class="col-lg-6 col-md-8 col-sm-8 col-xs-12 col-lg-offset-3 col-md-offset-2 col-sm-offset-2">
    <h1>id: {{ $task->id }} のタスク編集ページ</h1>


    {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}
    <div class="form-group">
        {!! Form::label('status', 'ステータス:') !!}
        {!! Form::text('status', null,  ['class' => 'form-control']) !!}
    </div>
     <div class="form-group">
        {!! Form::label('content', 'タスク:') !!}
        {!! Form::text('content', null,  ['class' => 'form-control']) !!}
    </div>
        {!! Form::submit('更新', ['class' => 'btn btn-default']) !!}

    {!! Form::close() !!}
    </div>
</div>
@endsection