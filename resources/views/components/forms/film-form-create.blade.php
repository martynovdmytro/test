<h3>Create Film</h3>
<form method="POST" action="/store/film" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" />
    <input type="file" name="image" />
    <input type="checkbox" name="status" />
    <label for="genres">Choose a genre:</label>
    <select name="genres[]" id="genres" multiple="multiple">
        @foreach($genres as $genre)
            <option>{{ $genre->name }}</option>
        @endforeach
    </select>
    <input type="submit">
</form>
