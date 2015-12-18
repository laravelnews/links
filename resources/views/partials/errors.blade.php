@if (isset($errors) and count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your submission.<br><br>
        @foreach($errors->all() as $error)
            <li>{!! $error !!}</li>
        @endforeach
    </div>
@endif

@if (session('status'))
    <div class="alert alert-success">
        <i class="fa fa-thumbs-up"></i> {{ session('status') }}
    </div>
@endif