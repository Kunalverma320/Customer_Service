<header class="p-3 mb-3 border-bottom">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{ url('/') }}" class="nav-link px-2 link-secondary">Home</a></li>
                {{-- <li><a href="" class="nav-link px-2 link-dark">Products</a></li>
          <li><a href="" class="nav-link px-2 link-dark">Category</a></li> --}}
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
            </form>

            <div class="dropdown text-end">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32"
                        class="rounded-circle">
                </a>
                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                    {{-- <li><a class="dropdown-item" href="{{ route('login') }}">User Login</a></li> --}}

                    @auth
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        @if (auth()->user()->role == 1)
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                            </li>
                        @endif

                        {{-- Check user role for role 3 --}}
                        @if (auth()->user()->role == 2)
                            <li>
                                <a class="dropdown-item" href="{{ route('vendor.dashboard') }}">Vendor Dashboard</a>
                            </li>
                        @endif
                    @else
                        <li><a class="dropdown-item" href="{{ route('login') }}">User Login</a></li>
                    @endauth

                    {{-- <li><a class="dropdown-item" href="#">Profile</a></li> --}}
                    {{-- <li><hr class="dropdown-divider"></li> --}}
                    {{-- <li><a class="dropdown-item" href="#">Sign out</a></li> --}}
                </ul>
            </div>
        </div>
    </div>
</header>
