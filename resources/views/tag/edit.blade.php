@extends('base.index')

@section('content')

    <div class="container my-4">
        <div class="row">
            <div class="col-6 offset-3">
                <div class="row">
                    <div class="col-12 text-center">
                        <h3>Thêm tag</h3>
                    </div>
                    <div class="col-12">
                        <form action="{{ route('tag.update', ['id' => $tag->id]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ $tag->title }}" placeholder="title">
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <input type="text" class="form-control" name="content" id="content" value="{{ $tag->content }}" placeholder="content">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Sửa tag</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection