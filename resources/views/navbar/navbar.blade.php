<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark d-flex">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Fixed navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('create.view') }}">Create Book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('category.create') }}">Create Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('author.view') }}">Create Author</a>
                    </li>
                </ul>
                <a href="/login" class="btn btn-outline-success">Login</a>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" href="{{route('logout')}}">Logout</button>
                </form>
            </div>
        </div>
    </nav>
</header>
