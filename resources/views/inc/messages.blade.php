<?php
/**
 * Created by PhpStorm.
 * User: Gebruiker
 * Date: 16-8-2018
 * Time: 17:55
 */
?>

@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
        @endforeach
    @endif

@if(session('succes'))
    <div class="alert alert-success">
        {{session('succes')}}
    </div>
    @endif

@if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif