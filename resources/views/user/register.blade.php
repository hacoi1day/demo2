@extends('base.index')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-6 offset-3 text-center">
                <h3>đăng ký</h3>
            </div>
            <div class="col-6 offset-3">
                @if(count($errors) > 0)
                    @component('base.component.alert', ['type' => 'danger'])
                        @slot('alert')
                            @foreach($errors->all() as $err)
                                {{ $err }} <br>
                            @endforeach
                        @endslot
                    @endcomponent
                @endif
            </div>
            <div class="col-6 offset-3">
                <form action="{{ route('post.register') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="password" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password again</label>
                        <input type="password" class="form-control" name="passwordAgain" id="passwordAgain" placeholder="password again" required>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>

@endsection