<div class="p-4 mb-3 bg-light rounded">
    <h4>{{ __('About') }}</h4>
    <p class="mb-0" style="text-align: justify">
        {{ \App\Models\About::first()->about }}
    </p>
</div>
