{{ dd($genres) }}
@foreach($genres as $genre)
    <h3>{{ $genre->name }}</h3>
@endforeach
