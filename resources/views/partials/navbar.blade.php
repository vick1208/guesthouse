<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Hotel Project</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{Request::is('/')? 'active' : '' }}" aria-current="page" href="/">Home</a>
                </li>

            </ul>

            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Selamat Datang {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                            @if (auth()->user()->role === "Super" || auth()->user()->role === "Admin")
                            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-window"></i>My Dashboard</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            @endif
                            @if (auth()->user()->role === "Guest")
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            @endif

                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{Request::is('login')? 'active' : '' }}" href="/login"><i
                                class="bi bi-box-arrow-in-right"></i>
                            Login</a>
                    </li>
                @endauth
            </ul>

        </div>
    </div>
</nav>
