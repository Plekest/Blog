<div>
    @foreach ($posts as $post)
    <div class="card mb-4">
        <div class="card-header">
            {{ $post->title }}
        </div>
        <div class="card-body">
          <blockquote class="blockquote mb-0">
            <p>{{!! $post->content !!}}</p>
            <footer class="blockquote-footer">Autoria de <cite title="Author">{{ Auth::user()->name }}</cite> - {{ $post->created_at->format('d/m/Y H:i') }}</footer>
          </blockquote>
        </div>
    </div>
    @endforeach
</div>
