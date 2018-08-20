<?php
/**
 * Created by PhpStorm.
 * User: Gebruiker
 * Date: 16-8-2018
 * Time: 17:39
 */
?>
@extends('layouts.app')

@section('content')
    <h1>create post</h1>
    {!! Form::open(['action' => 'Postcontroller@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{form::label('title', 'Title')}}
        {{form::text('title', '', ['class' => 'form-control', 'placeholder' => 'title'])}}

    </div>

    <div class="form-group">
        {{form::label('body', 'body')}}
        {{form::textarea('body', '', ['id' =>'article-ckeditor','class' => 'form-control', 'placeholder' => 'bodytext'])}}

    </div>
    {{form::submit('submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection