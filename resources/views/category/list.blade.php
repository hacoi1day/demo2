@extends('base.index')

@section('content')

    <div class="container my-4">
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col-12 text-center">
                        <h3>Danh sách Category</h3>
                    </div>
                    <div class="col-12">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Display name</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $categorie)
                                <tr>
                                    <th scope="row">{{ $categorie->id }}</th>
                                    <td>{{ $categorie->name }}</td>
                                    <td>{{ $categorie->display_name }}</td>
                                    <td>
                                        <a href="{{ route('category.edit', ['id' => $categorie->id]) }}">Edit</a>
                                        <a href="{{ route('category.delete', ['id' => $categorie->id]) }}">Delete</a>
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
                        <h4>Thêm Category</h4>
                    </div>
                    <div class="col-12">
                        <form action="{{ route('category.add') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="name">
                            </div>
                            <div class="form-group">
                                <label for="display_name">Display name</label>
                                <input type="text" class="form-control" id="display_name" name="display_name" placeholder="display name">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Thêm Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection