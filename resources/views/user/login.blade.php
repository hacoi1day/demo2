@extends('base.index')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-6 offset-3 text-center">
                <h3>đăng nhập</h3>
            </div>
            <div class="col-6 offset-3">
                @if(session('message'))
                    @component('base.component.alert', ['type' => 'success'])
                        @slot('alert')
                            {{ session('message') }}
                        @endslot
                    @endcomponent
                @endif
            </div>
            <div class="col-6 offset-3">
                <form action="{{ route('post.login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="password">
                    </div>
                    <button type="submit" class="btn btn-block btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection