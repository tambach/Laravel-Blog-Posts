@extends('layouts.app')

@section('content')
    <h1>Posts </h1>


    @if(count($posts) > 0)
        <div class="text-center">
            <form class="form-inline" action="/posts" method="GET">
                <div class="form-group">
                    <label for="email">Order By</label>
                    <select id="email" class="form-control" style="width: 90%" name="sort_field">
                        <option>title</option>
                        <option>created_at</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pwd">Order</label>
                    <select id="pwd" class="form-control" style="width: 90%" name="sort_order">
                        <option>Ascending</option>
                        <option >Descending</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-default" style="margin-top: 24px">Submit</button>
            </form>
        </div><br><br>
        @foreach($posts as $post)
            <div class="well">
                    <div class="row">

                        <div class="col-md-4 col-sm-4">
                            <a href="/posts/{{$post->id}}">
                                <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
                            </a>
                        </div>
                        <h3> <a href="/posts/{{$post->id}}">{{$post->title}}</a> </h3>
                        <p>{{$post->description}}  </p>
                        <div class="fixed-bottom">

                            <small>Written by {{ $post->user->name }} </small><br>
                            <small> {{ $post->created_at->format('d/m/Y') }}</small><br><br>
                            <div class="input-group fixed-bottom ">
                                <span class="glyphicon glyphicon-comment"> </span>  {{ $post->comment->count() }}
                            </div>

                        </div>

                    </div>
            </div>
        @endforeach
        {{$posts->links()}}
    @else
        <p>No posts found</p>
    @endif
@endsection