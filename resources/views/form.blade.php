
<form action="/uni-post" method="POST">
  @method('POST')
  @csrf
  <p>{{$title}}</p>
  <p>{{$content}}</p>
  <p>{{$footer}}</p>
  <input type="text" name="username" placeholder="User name..." />
  <button type="submit" role="button">Submit</button>
</form>