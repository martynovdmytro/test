<h3>Edit Genre</h3>
<form method="POST" action="/edit/">
    @csrf
    <input type="text" name="name" value="{{ $genre->name }}" />
    <input type="submit">
</form>
