@extends('base.index')

@section('content')
    <div class="container my-3">
        <div class="row">
            <div class="col-8 offset-2 text-center">
                <h3>thêm bài viết</h3>
            </div>
            <div class="col-8 offset-2">
                <form action="{{ route('article.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control {{ $errors->has('title') ? "is-invalid" : "" }}" name="title" id="title" placeholder="tiêu đề">
                        @if($errors->has('title'))
                        <span class="invalid-feedback">{{ $errors->has('title') ? $errors->first('title') : "" }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea class="form-control {{ $errors->has('body') ? "is-invalid" : "" }}" name="body" id="body" rows="3"></textarea>
                        @if($errors->has('body'))
                        <span class="invalid-feedback">{{ $errors->has('body') ? $errors->first('body') : "" }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" id="category" name="category_id">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->display_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="role">Tags</label>
                        <select class="form-control" id="role" name="tags[]" multiple>
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id  }}">{{ $tag->title  }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" name="status" id="status">
                        <label class="form-check-label" for="status">
                            Nổi bật
                        </label>
                    </div>
                    <button type="submit" class="btn btn-success">Add</button>
                </form>
            </div>
        </div>
    </div>

@endsection