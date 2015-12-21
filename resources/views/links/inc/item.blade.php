<li class="link">
    <a class="link--rating" data-id="{{ $link->id }}" href="#">
        {{--<i class="fa fa-heart {{ (Auth::check() and Auth::user()->hasVoted($link->id)) ? 'voted' : '' }}"></i>--}}
        {{--<i class="fa fa-caret-up "></i>--}}
        {{--<span>{{ $link->rating() }}</span>--}}
    </a>
    <div class="link--details">
        <div class="link--category">
            <a href="/category/{{ $link->category->slug }}">
                <i class="fa {{ $link->category->icon() }}"></i>
                {{ $link->category->name }}
            </a>
        </div>
        <h4>
            <a href="/resource/{{ $link->slug }}/">
                {!! $link->title !!}
            </a>
            <em>({{ $link->hostName() }})</em>
        </h4>
        <div class="link--meta">
            <span class="desc">
                {{ str_limit(strip_tags($link->parsed_description), 150) }}
            </span>
            <a href="/resource/{{ $link->slug }}">More</a>
        </div>
        <div class="link--author">
            @include('links.inc.author')
        </div>
    </div>
    <hr>
</li>