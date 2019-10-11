@extends('layouts.app')

@section('content')
    <h2>{{$post->title}} </h2>
    @if($post->cover_image !== 'noimage.jpg')
         <img style="width:30%" src="/storage/cover_images/{{$post->cover_image}}">
    @endif
<br>
    <br>
    <div>
        <p>{{$post->description}}  </p>
    </div>
    <div>
        <p>{{$post->body}}  </p>
    </div>
    <hr>
    <small>Written on {{$post->created_at}}</small>
    <p>Written by {{$post->user->name}}</p>

    <hr>

    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <div>
                <a href="/posts/{{$post->id}}/edit" class="btn btn-primary pull-right" style="margin-left: 10px"> Edit post</a>


                {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' =>'pull-right' ]) !!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'] )}}
                {!! Form::close() !!}
                    <a href="/posts" class="btn btn-default " > Go Back </a>
            </div>
        @endif

        <br><br><br>
        <div class="container">
            <h4 ><strong>
                    Comments
                </strong>
            </h4>
        </div>
        <br>
        @if(count($comments) > 0)
            <div>
                <p><strong>{{count($comments)}} comments </strong></p>
            </div>
            @foreach($comments as $comment)
                <div class="well">
                    <div class="row">
                        <div >
                           <p ><strong>{{$comment->name}}</strong></p>
                        </div>
                        <p>{{$comment->comment}}  </p>
                    </div>
                </div>
            @endforeach
        @else
            <p>No comment yet</p>
        @endif
        <br>
        <br>
        <div class="container">
            <h4 ><strong>
                Add comments
                </strong>
            </h4>
        </div>
        <br>
        {!! Form::open(['url' => '/posts/comment/'.$post->id, 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">

            {{Form::label('name', 'Username')}}
            {{Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Name', 'readonly' => 'true'])}}
        </div>
        <div class="form-group">

            {{Form::label('comment', 'Comment')}}
            {{Form::textarea('comment', '', ['class' => 'form-control', 'placeholder' => 'Comment'])}}
        </div>

        {{Form::submit('Submit', ['class' => 'btn btn-success pull-right'])}}
        {!! Form::close() !!}
        <div></div>
        <br><br>
    @endif

@endsection