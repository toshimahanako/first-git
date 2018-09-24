@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
    <h1>id: {{ $message->id }} のメッセージ編集ページ</h1>
    <div class="row">
        <div class="col-xs-12">
        <div class="col-sm-offset-2 col-sm-8">
        <div class="col-lg-offset-3 col-lg-6">

        {!! Form::model($message, ['route' => ['messages.update', $message->id], 'method' => 'put']) !!}
            <div class="form-group">
                {!! Form::label('status', 'ステータス:') !!}
                {!! Form::text('status', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('content', 'メッセージ:') !!}
                {!! Form::text('content', null, ['class' => 'form-control']) !!}
            </div>

            {!! Form::submit('更新', ['class' => 'btn btn-default']) !!}
        </div>
        </div>
        </div>
    </div>
    {!! Form::close() !!}

@endsection