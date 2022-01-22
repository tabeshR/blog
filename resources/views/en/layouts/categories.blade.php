 @foreach($categories as $cat)
        <li style="margin-bottom: {{ $cat->parent_id == null ? "10px"  :"0" }}"><span class="{{ $cat->child->count() ? "fas fa-plus-circle caret" : "" }}"><a style="margin-left: 9px"
                    href="{{ route('show.post.by.category',[$cat->id,'lang'=>'en']) }}">{{ $cat->en_name }}</a></span>
            @if($cat->child)
                <ul class="nested">
                    @include('en.layouts.categories',['categories'=>\App\Models\Category::where('parent_id',$cat->id)->get()])
                </ul>
            @endif
        </li>
    @endforeach

