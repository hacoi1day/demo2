@extends('base.index')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h3>Danh sách bài viết</h3>
            </div>
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Tag</th>
                            <th scope="col">Category</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                    <tr>
                        <th scope="row">{{ $loop->index+1 }}</th>
                        <td>{{ $article->title }}</td>
                        <td>
                            <ul>
                                @if(count($article->tags) > 0)
                                @foreach($article->tags as $tag)
                                    <li>{{ $tag->title }}</li>
                                @endforeach
                                @else
                                    <li>Không có tag</li>
                                @endif
                            </ul>
                        </td>
                        <td>{{ $article->category->display_name }}</td>
                        <td>{{ $article->status }}</td>
                        <td>
                            <a href="{{ route('article.edit', ['id' => $article->id]) }}">Edit</a>
                            <a href="{{ route('article.delete', ['id' => $article->id]) }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection