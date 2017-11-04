@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
<div class="row">
<div class="col-lg-6 col-md-8 col-sm-8 col-xs-12 col-lg-offset-3 col-md-offset-2 col-sm-offset-2">
    <h1>タスク一覧</h1>
    @if (count($tasks) > 0)
        <ul class="list-group">
            @foreach ($tasks as $task)
                <li class="list-group-item">{!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!} : {{ $task->status }} > {{ $task->content }}</li>
            @endforeach
        </ul>
    @endif

{!! link_to_route('tasks.create', '新規タスク作成', null, ['class' => 'btn btn-primary']) !!}
</div>
</div>



@endsection