@extends('layouts.app')

@section('content')
    <div class="primary">
        <ul class="links">
            @each('links.inc.item', $links, 'link')

            {!! $links->render() !!}
        </ul>
    </div>
@endsection
