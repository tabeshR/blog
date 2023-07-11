<h4>{{ __('Follow Us') }}</h4>
<ol class="list-unstyled">
    @foreach(\App\Models\Socials::all() as $social)
    <li><a href="{{ $social->link }}">{{ __($social->name) }}</a></li>
    @endforeach
</ol>
