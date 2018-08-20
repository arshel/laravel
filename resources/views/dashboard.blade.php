@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! <br>
                        <a href="/post/create" class="btn btn-primary">create post</a>
                    <h3>your blog post</h3>
                        @if(count($posts )> 0)
                    <table class="table table-striped">
                        <tr>
                            <th>title</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                                <td><a href="/post/{{$post->id}}/edit" class="btn btn-default">edit</a></td>
                                <td>{!! Form::open(['action' => ['Postcontroller@destroy', $post->id], 'method' => 'post ', 'class' => 'float-right']) !!}
                                    {{form::hidden('_method', 'DELETE')}}
                                    {{form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                    {!! Form::close() !!}</td>
                            </tr>
                            @endforeach
                    </table>
                            @else
                    <p> you have no post</p>
                            @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
