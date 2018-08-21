@extends('layouts.app')


@section('content')
    <div class="jumbotron text-center">
        @auth
            <h1>hey gebruiker</h1>
            <p>This is the index page</p>
        @endauth

        @guest
                <h2>{{$title}}</h2>
                <p>This is the index page</p>
                <p>
                <a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>
                <a class="btn btn-success btn-lg" href="/register" role="button">Register</a>
                </p>
        @endguest


    </div>﻿
@endsection
