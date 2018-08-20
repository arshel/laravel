

<?php
/**
 * Created by PhpStorm.
 * User: Gebruiker
 * Date: 7-8-2018
 * Time: 17:57
 */
?>
@extends('layouts.app')

@section('content')
<h1>{{$title}}</h1>
@if(count($services) > 0 )
    <ul class="list-group">
@foreach ($services as $service)
    <li class="list-group-item">{{$service}}</li>
    @endforeach
    </ul>
    @endif
@endsection