@extends('layouts.default')

@section('title')
{{$title}}
@endsection


@section('content')
<form method="POST" style="width: 26rem;" class="mx-auto">
  @csrf
  @method('POST')
  <!-- Name input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <label class="form-label" for="post-title">Title</label>
    <input type="text" id="post-title" class="form-control" value="{{old('post_title')}}" name="post_title" /> 
    @error('post_title')
      <p class="text-danger my-0" style="font-size: 14px">*{{$message}}</p>
    @enderror
  </div>


  <!-- Message input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <label class="form-label" for="post-content">Content</label>
    <textarea class="form-control" id="post-content" value="{{old('post_content')}}" name="post_content" rows="4"></textarea>
    @error('post_content')
      <p class="text-danger my-0" style="font-size: 14px">*{{$message}}</p>
    @enderror
  </div>


  <!-- Submit button -->
  <button data-mdb-ripple-init type="submit" class="btn btn-primary w-100 d-block mb-4">Post</button>
</form>
@endsection