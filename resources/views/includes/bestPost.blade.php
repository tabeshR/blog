<div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
        <h1 class="display-4">{{ $best_post->title }}</h1>
        <p class="lead my-3">{{ Str::limit($best_post->body,300) }}</p>
        <p class="lead mb-0"><a href="{{ route('post',$best_post->id) }}" class="text-white fw-bold">{{ __('Continue reading...') }}</a></p>
    </div>
</div>
