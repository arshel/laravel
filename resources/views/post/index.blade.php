<?php
/**
 * Created by PhpStorm.
 * User: Gebruiker
 * Date: 14-8-2018
 * Time: 14:40
 */
?>
@extends('layouts.app')

@section('content')
    <h1>post</h1>

    @if(count($posts) > 0)
    @foreach($posts as $post)
        <div class="card">
            <h3><a href="/post/{{$post->id}}">{{$post->title}}</a></h3>
            <small>written on {{$post->created_at}} by {{$post->user->name}}</small>
        </div>
        @endforeach
        {{$posts->links()}}
    @else
        <p>no post found</p>
    @endif
    @endsection