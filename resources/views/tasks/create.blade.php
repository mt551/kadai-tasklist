@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
    <h1>タスク新規作成ページ</h1>

    <!-- Form::model() でフォームを開始 -->
    {!! Form::model($task, ['route' => 'tasks.store']) !!}
    <!-- Form::model() は第一引数に対象となる Model のインスタンスを取り、第二引数は連想配列を取ります。-->
    
        {!! Form::label('status', 'ステータス:') !!}
        {!! Form::text('status') !!}

        {!! Form::label('content', 'タスク:') !!}
        {!! Form::text('content') !!}

        {!! Form::submit('投稿') !!}

    {!! Form::close() !!}


@endsection