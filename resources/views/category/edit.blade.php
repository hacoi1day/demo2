@extends('base.index')

@section('content')

    <div class="container my-4">
        <div class="row">
            <div class="col-6 offset-3">
                <div class="row">
                    <div class="col-12 text-center">
                        <h4>Sửa Category</h4>
                    </div>
                    <div class="col-12">
                        <form action="{{ route('category.update', ['id' => $category->id]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" placeholder="name">
                            </div>
                            <div class="form-group">
                                <label for="display_name">Display name</label>
                                <input type="text" class="form-control" id="display_name" name="display_name" value="{{ $category->display_name }}" placeholder="display name">
                            </div>

                            <button type="submit" class="btn btn-primary">Sửa Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection