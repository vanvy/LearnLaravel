<form action="{{ route('postForm') }}" method="post">
  @csrf
  <input type="text" name="hoten">
  <input type="submit" value="Submit">
</form>