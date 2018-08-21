<?php
/**
 * Created by PhpStorm.
 * User: Gebruiker
 * Date: 14-8-2018
 * Time: 15:01
 */

?>
@extends('layouts.app')

@section('content')
    <a href="/post" class="btn btn-default">go back</a>
    <h1>{{$post->title}}</h1>
    <img style="width: 50%" src="/storage/cover_images/{{$post->cover_image}}" alt="">


    <div>
        {!!$post->body!!}
    </div>
    <hr>
    <small>written on {{$post->created_at}} by {{$post->user->name}}</small>
    <hr>

@if(!Auth::guest())
    @if(Auth::user()->id == $post->user_id)
    <a href="/post/{{$post->id}}/edit" class="btn btn-default">edit</a>


    {!! Form::open(['action' => ['Postcontroller@destroy', $post->id], 'method' => 'post ', 'class' => 'float-right']) !!}
    {{form::hidden('_method', 'DELETE')}}
    {{form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!! Form::close() !!}
@endif
@endif
@endsection