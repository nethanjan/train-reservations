<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="py-4">
                @if (Route::has('login'))
                <div class="top-right links">
                    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav align-items-center">
                                @auth
                                @if(Route::current()->getName() === null)
                                    <a class="nav-item nav-link border border-white @if(Request::path() === '/') active @endif" href="{{ url('/dashboard') }}">Dashboard</a>
                                @else
                                    <a class="nav-item nav-link border border-white @if(Request::path() === '/') active @endif" href="{{ url('/') }}">Home</a>
                                @endif
                                    
                                    <a class="nav-item">
                                        <form action="/logout" method="POST">
                                            @csrf
                                            <input type="submit" value="Logout" class="btn btn-outline-danger">
                                        </form>
                                    </a>
                                @else
                                    <a class="nav-item nav-link @if(Request::path() === 'login') active @endif" href="{{ url('/') }}">Home</a>
                                    <a class="nav-item nav-link @if(Request::path() === 'login') active @endif" href="{{ url('/login') }}">Login</a>
                                @endauth
                            </div>
                        </div>
                    </nav>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>