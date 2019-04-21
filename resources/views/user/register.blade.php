@extends('base.index')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-6 offset-3 text-center">
                <h3>đăng ký</h3>
            </div>
            <div class="col-6 offset-3">
                <form action="{{ route('post.register') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">name</label>
                        <input type="text" class="form-control {{ $errors->has('name') ? "is-invalid" : "" }}" name="name" id="name" value="{{ old('name') }}" placeholder="name">
                        @if($errors->has('name'))
                            <span class="invalid-feedback">{{ $errors->has('name') ? $errors->first('name') : "" }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">email address</label>
                        <input type="email" class="form-control {{ $errors->has('email') ? "is-invalid" : "" }}" name="email" id="email" value="{{ old('email') }}" placeholder="email">
                        @if($errors->has('email'))
                            <span class="invalid-feedback">{{ $errors->has('email') ? $errors->first('email') : "" }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password">password</label>
                        <input type="password" class="form-control {{ $errors->has('password') ? "is-invalid" : "" }}" name="password" id="password" placeholder="password">
                        @if($errors->has('password'))
                            <span class="invalid-feedback">{{ $errors->has('password') ? $errors->first('password') : "" }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="passwordAgain">password confim</label>
                        <input type="password" class="form-control {{ $errors->has('passwordAgain') ? "is-invalid" : "" }}" name="passwordAgain" id="passwordAgain" placeholder="password confim">
                        @if($errors->has('passwordAgain'))
                            <span class="invalid-feedback">{{ $errors->has('passwordAgain') ? $errors->first('passwordAgain') : "" }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-block btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>

@endsection