<h3>Create Genre</h3>
<form method="POST" action="/store/genre">
    @csrf
    <input type="text" name="name" />
    <input type="submit">
</form>
