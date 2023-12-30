<form action="/photos" method="POST">
  @method('POST')
  @csrf
  <input type="text" name="photo-name" placeholder="Photo name..." />
  <button type="submit" role="button">Submit</button>

</form>