<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('posters.update', ['id' => $post->id]) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="FormControlInput">Título</label>
                    <input type="text" class="form-control" id="FormControlInput" name="title" placeholder="Título"
                        value="{{ $post->title }}" required>
                </div>

                <div class="form-group">
                    <label for="FormControlTextarea;"></label>
                    <x-trix-input id="content" name="content" value="{!! $post->content !!}" required />
                </div>

                <button type="submit" class="btn btn-primary">Publicar</button>

            </form>
        </div>
    </div>

</x-app-layout>
