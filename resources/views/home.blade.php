@extends('layouts.app')

@section('content')
    <div class="container" style="width: 90%">
        <div class="row">
            <div >
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <a href="/posts/create" class="btn btn-primary">Create Post</a>
                        <h3>Your Blog Posts</h3>

                        @if(count($posts) > 0 )
                            <table class="table table-striped" >
                                <tr>

                                </tr>
                                @foreach($posts as $post)
                                    <tr>
                                        <td><a href="/posts/{{$post->id}}"> <img style="width:40%" src="/storage/cover_images/{{$post->cover_image}}"> </a></td>
                                        <td style="width: 40%"><h4 style="margin-right: 129px"><a href="/posts/{{$post->id}}"> {{$post->title}}  </a></h4> </td>
                                        <td><a href="/posts/{{$post->id}}/edit" class="btn btn-primary"> Edit </a> </td>
                                        <td >   {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' =>'pull-right' ]) !!}
                                                    {{Form::hidden('_method', 'DELETE')}}
                                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'] )}}
                                                {!! Form::close() !!} </td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            <p> You have no posts</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection