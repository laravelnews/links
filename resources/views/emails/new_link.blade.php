{{ $link->user->name }} has just submitted a new link and it's waiting for approval:

<hr>
<h4>{!! $link->title !!}</h4>
{{ $link->url }}
<p>{{ $link->description }}</p>

<p><a href="http://links.laravel-news.com/admin">Verify and Approve</a></p>
