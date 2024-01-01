@extends('layouts.default')

@section('title')
{{$title}}
@endsection


@section('content')
<div class="container px-4 px-lg-5">
  <h3 class="post-subtitle">{{$posts->content}}</h3>
  <p class="post-meta">
      Posted by
      <a href="#!">{{$posts->author}}</a>
      on {{$posts->created_at}}
  </p>
</div>
@endsection