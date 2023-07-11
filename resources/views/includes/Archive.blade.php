<h4>{{ __('Archives') }}</h4>
<ol class="list-unstyled mb-0">
    @foreach($archives as $archive)
        <li><a href="{{ route('archive.getPosts',['month'=>$archive->month,'year'=>$archive->year]) }}">{{ $archive->month }} {{ enToFa($archive->year) }}</a></li>
    @endforeach
</ol>
