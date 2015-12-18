@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Submit a new resource</h3>
        </div>
        <div class="panel-body">
            <form method="post" action="/submit" class="form-horizontal" enctype="multipart/form-data">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                        <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Click baity title">
                    </div>
                </div>

                <div class="form-group">
                    <label for="url" class="col-sm-2 control-label">URL</label>
                    <div class="col-sm-10">
                        <input id="url" type="text" class="form-control" name="url" value="{{ old('url') }}" placeholder="URL to the resource">
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Leave some commentary on why this link is worth visiting. Markdown is supported.">{{ old('description') }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="category" class="col-sm-2 control-label">Category</label>
                    <div class="col-sm-10">
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection