<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <a class="navbar-brand" href="#">Kaopiz</a>
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('article.list') }}">List Article</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('article.add') }}">Add Article</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('tag.list') }}">Tag</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('category.list') }}">Category</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('account.insert') }}">Account Add</a>
                        </li>
                        @if(!Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('get.login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('get.register') }}">Register</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('get.logout') }}">Logout</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>

</nav>