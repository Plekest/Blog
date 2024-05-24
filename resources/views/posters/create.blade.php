<form action="{{ route('posters.store') }}" method="POST">
    @csrf
    @method('POST')

    <div class="form-group">
        <label for="FormControlInput">Título</label>
        <input type="text" class="form-control" id="FormControlInput" name="title" placeholder="Título" value="{{ old('title') }}" required>
    </div>

    <div class="form-group">
        <label for="FormControlTextarea;"></label>
        <x-trix-input id="content" name="content" value="{{ old('content') }}" required/>
    </div>

    <button type="submit" class="btn btn-primary">Publicar</button>

</form>
