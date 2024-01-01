@extends('layouts.default')

@section('title')
{{$title}}
@endsection


@section('content')
<div class="container px-4 px-lg-5">
  <div class="row gx-4 gx-lg-5 justify-content-center">
      <div class="col-md-10 col-lg-8 col-xl-7">
        @forelse  ($posts as $item)
          <!-- Post preview-->
          <div class="post-preview">
              <a href="{{route('blog.detail',['slug'=>$item->slug,'id'=>$item->id])}}">
                  <h2 class="post-title">{{$item->title}}</h2>
                  <h3 class="post-subtitle">{{$item->content}}</h3>
              </a>
              <p class="post-meta mb-3">
                  Posted by
                  <a href="#!">{{$item->author}}</a>
                  on {{$item->created_at}}
              </p>
              <a href="{{route('blog.actions.edit',['slug'=>$item->slug,'id'=>$item->id])}}" class="btn btn-warning py-2 px-3">Edit post →</a>
              <a onclick="return confirm('Are you sure you want to delete : {{$item->title}}?')" href="{{route('blog.actions.delete',['slug'=>$item->slug,'id'=>$item->id])}}" class="btn btn-danger text-white py-2 px-3">Delete post →</a>
          </div>
          <!-- Divider-->
          <hr class="my-4" />
          @empty
          <h2 class="post-title">No Posts</h2>
          @endforelse
          <!-- Pager-->
          <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="{{route('blog.actions.add')}}">Add new post →</a></div>
      </div>
  </div>
</div>
@endsection