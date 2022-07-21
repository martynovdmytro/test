<h3>Edit Film</h3>
<form method="POST" action="/store/film" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" value="{{ $film->name }}"/>
    <input type="file" name="image" value="{{ $film->image }}" />
    <input type="checkbox" name="status" />
    <input type="submit">
</form>
