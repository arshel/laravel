<?php
/**
 * Created by PhpStorm.
 * User: Gebruiker
 * Date: 16-8-2018
 * Time: 19:30
 */
?>
@extends('layouts.app')

@section('content')
    <h1>edit post</h1>
    {!! Form::open(['action' => ['Postcontroller@update', $post->id], 'method' => 'post ', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{form::label('title', 'Title')}}
        {{form::text('title', $post->title,['class' => 'form-control', 'placeholder' => 'title'])}}

    </div>

    <div class="form-group">
        {{form::label('body', 'body')}}
        {{form::textarea('body', $post->body, ['id' =>'article-ckeditor','class' => 'form-control', 'placeholder' => 'bodytext'])}}

    </div>
    <div class="form-group">
        {{form::file('cover_image')}}
    </div>
    {{form::hidden('_method', 'PUT')}}
    {{form::submit('submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection