@foreach($posts as $post)
    <article class="blog-post">
        <h2 class="blog-post-title">{{ $post->title }}</h2>
        <p class="blog-post-meta">{{ enToFa(jdate($post->created_at)->format('%d %B %Y')) }} نوشته : <a
                href="#">{{ $post->user->name }}</a></p>
        <p style="text-align: justify">
            {{ \Illuminate\Support\Str::limit($post->body,500) }}
        </p>
        <a href="{{ route('post',$post->id) }}">{{ __('Continue reading...') }}</a>
    </article>
@endforeach
{{ $posts->render() }}
