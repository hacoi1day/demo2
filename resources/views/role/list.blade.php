@extends('base.index')

@section('content')

    <div class="container my-3">
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col-12 text-center">
                        <h3>danh sách role</h3>
                    </div>
                    <div class="col-12">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">display_name</th>
                                <th scope="col">action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $role)
                                <tr>
                                    <th scope="row">{{ $loop->index+1 }}</th>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->display_name }}</td>
                                    <td>
                                        <a href="{{ route('role.edit', ['id' => $role->id]) }}">Edit</a>
                                        <a href="{{ route('role.delete', ['id' => $role->id]) }}">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-6 ">
                <div class="row">
                    <div class="col-12 text-center">
                        <h3>thêm role</h3>
                    </div>
                    <div class="col-12">
                        <form action="{{ route('role.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="name">
                            </div>
                            <div class="form-group">
                                <label for="display_name">display name</label>
                                <input type="text" class="form-control" name="display_name" id="display_name" placeholder="display name">
                            </div>
                            @foreach($permissions as $permission)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="permissions[]" id="{{ $permission->name }}" value="{{ $permission->id }}">
                                <label class="form-check-label" for="{{ $permission->name }}">{{ $permission->display_name }}</label>
                            </div>
                            @endforeach

                            <button type="submit" class="btn btn-block btn-primary mt-2">thêm role</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection