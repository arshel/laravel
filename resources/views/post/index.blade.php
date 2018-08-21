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
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <img style="width: 100%" src="/storage/cover_images/{{$post->cover_image}}" alt="">
                </div>
                <div class="col-md-4 col-sm-8">
                    <h3><a href="/post/{{$post->id}}">{{$post->title}}</a></h3>
                    <small>written on {{$post->created_at}} by {{$post->user->name}}</small>
                </div>
            </div>

        </div>
        @endforeach
        {{$posts->links()}}
    @else
        <p>no post found</p>
    @endif
    @endsection