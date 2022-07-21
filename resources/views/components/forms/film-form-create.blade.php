<h3>Create Genre</h3>
<form method="POST" action="/store/film" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" />
    <input type="file" name="image" />
    <input type="checkbox" name="status" />
    <input type="submit">
</form>
