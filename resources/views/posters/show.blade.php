<div>
    @foreach ($posts as $post)
        {{-- início da modal apagar --}}
        <div class="modal" tabindex="-1" role="dialog" id="modal-{{ $post->id }}">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><b>Tem certeza de que deseja apagar?</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Depois que o post for apagado não terá mais como recuperar, todas as informações e arquivos
                            serão apagados.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                        <form action="{{ route('posters.destroy', ['id' => $post->id]) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Apagar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- fim da modal apagar --}}

        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>{{ $post->title }}</span>
                <div class="btn-group" role="group">
                    <button type="button" data-toggle="modal" data-target="#modal-{{ $post->id }}" class="btn btn-danger btn-sm rounded mr-2">
                        <i class="fa-solid fa-x" style="color: #ffff"></i>
                    </button>
                    <a href="{{ route('posters.edit', ['id' => $post->id]) }}" class="btn btn-primary btn-sm rounded">
                        <i class="fa-solid fa-pen-to-square" style="color: #ffff"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>{!! $post->content !!}</p>
                    <footer class="blockquote-footer">Autoria de <cite title="Author">{{ Auth::user()->name }}</cite> -
                        {{ $post->created_at->format('d/m/Y H:i') }}</footer>
                </blockquote>
            </div>
        </div>
    @endforeach
</div>
