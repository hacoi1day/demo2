@extends('base.index')

@section('content')

    <div class="container my-3">
        <div class="row">
            <div class="col-8 offset-2 text-center">
                <h4>sửa bài viết</h4>
            </div>
            <div class="col-8 offset-2">
                <form action="{{ route('article.update', ['id' => $article->id]) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ $article->title }}" placeholder="tiêu đề">
                    </div>
                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea class="form-control" name="body" id="body" rows="3">{{ $article->body }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" id="category" name="category_id">
                            @foreach($categories as $category)
                                <option @if($article->category->id == $category->id) selected @else  @endif value="{{ $category->id }}">{{ $category->display_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="role">Tags</label>
                        <select class="form-control" id="role" name="tags[]" multiple>
                            @foreach($tags as $tag)
                                <option {{ $tagsArticle->contains($tag->id) ? "selected" : "" }} value="{{ $tag->id  }}">{{ $tag->title  }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" name="status" id="status" {{ ($article->status == 1) ? "checked" : "" }}>
                        <label class="form-check-label" for="status">
                            Nổi bật
                        </label>
                    </div>
                    <button type="submit" class="btn btn-success">Edit</button>
                </form>
            </div>
        </div>
    </div>

@endsection