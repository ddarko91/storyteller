<style>
  nav{
    letter-spacing: 1.5px;
  }
  .navbar-brand{
    font-size: 160% !important;
  }
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="/">Storyteller</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation"> -
  </button>
  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto"></ul>
    <div>
      @if (Route::has('login'))
        <div class="hidden fixed top-0 right-4 px-5 py-2 mr-5 sm:block text-light">
        @auth
          <div class="nav-item float-left">
            <a href="/articles" class="nav-link text-light">Articles</a>
          </div>
          <div class="nav-item dropdown float-left">
            <a class="nav-link dropdown-toggle text-light" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a>
              <form action="{{ route('logout') }}" method="post">
                @csrf
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
              </form>
            </div>
          </div>
        @else
          <a href="{{ route('login') }}" class="text-sm text-light underline">Login</a>
            @if (Route::has('register'))
              <a href="{{ route('register') }}" class="ml-4 text-sm text-light underline">Register</a>
            @endif
        @endif
        </div>
      @endif    
    </div> 
  </div>
</nav>