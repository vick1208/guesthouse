<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{Request::is('dashboard')? 'active' : '' }}" aria-current="page" href="/dashboard">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            @if (auth()->user()->role === "Super")

            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/user*')? 'active' : '' }}" href="/dashboard/user">
                    <span data-feather="user"></span>
                    User Record
                </a>
            </li>
            @endif

            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/room*')? 'active' : '' }}" href="/dashboard/room">
                    <span data-feather="book"></span>
                    Room Record
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/guest*')? 'active' : '' }}" href="/dashboard/guest">
                    <span data-feather="book"></span>
                    Guest Record
                </a>
            </li>

            <li class="border-top my-2"></li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/register*')? 'active' : '' }}" href="/dashboard/register">
                    <span data-feather="user"></span>
                    Register Guest
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/trareg*')? 'active' : '' }}" href="/dashboard/trareg">
                    <span data-feather="dollar-sign"></span>
                    Transaction Register
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/reserve*')? 'active' : '' }}" href="/dashboard/reserve">
                    <span data-feather="book-open"></span>
                    Reservation Room
                </a>
            </li>
        </ul>
    </div>
</nav>
