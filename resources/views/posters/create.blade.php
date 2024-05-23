<form action="{{ route('posters.store') }}" method="POST">
    @csrf
    @method('POST')

    <div class="form-group">
        <label for="exampleFormControlInput1">Título</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="Título">
    </div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Descrição</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

</form>
