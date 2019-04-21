@extends('base.index')

@section('content')

    <div class="container my-4">
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col-12 text-center">
                        <h3>Danh sách Tag</h3>
                    </div>
                    <div class="col-12">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Content</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tags as $tag)
                                <tr>
                                    <th scope="row">{{ $tag->id }}</th>
                                    <td>{{ $tag->title }}</td>
                                    <td>{{ $tag->content }}</td>
                                    <td>
                                        <a href="{{ route('tag.edit', ['id' => $tag->id]) }}">Edit</a>
                                        <a href="{{ route('tag.delete', ['id' => $tag->id]) }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-12 text-center">
                        <h3>Thêm tag</h3>
                    </div>
                    <div class="col-12">
                        <form action="{{ route('tag.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="title">
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <input type="text" class="form-control" name="content" id="content" placeholder="content">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Thêm tag</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection