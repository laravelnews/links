Added by
@if ($link->user->twitter)
    <a href="http://twitter.com/{{ $link->user->twitter }}">{{ $link->user->twitter }}</a>
@else
    {{ $link->user->name }}
@endif
<span class="date" data-livestamp="{{ $link->published_at->toIso8601String() }}" data-date="{{ $link->published_at->toIso8601String() }}">{{ $link->published_at->toFormattedDateString() }}</span>
{{--&#8226;--}}
<a class="share" href="https://twitter.com/intent/tweet/?text={{ urlencode(str_limit($link->title, 100)) }}&url={{ urlencode('http://links.laravel-news.com/resource/'.$link->slug.'/') }}" target="_blank"><i class="fa fa-twitter"></i></a>
<a class="share" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode('http://links.laravel-news.com/resource/'.$link->slug.'/') }}" target="_blank"><i class="fa fa-facebook"></i></a>